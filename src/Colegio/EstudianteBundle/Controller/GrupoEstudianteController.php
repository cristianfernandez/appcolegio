<?php

namespace Colegio\EstudianteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\EstudianteBundle\Entity\GrupoEstudiante;
use Colegio\EstudianteBundle\Form\GrupoEstudianteType;

/**
 * GrupoEstudiante controller.
 *
 */
class GrupoEstudianteController extends Controller
{

    /**
     * Lists all GrupoEstudiante entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->findAll();

        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new GrupoEstudiante entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new GrupoEstudiante();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            //return $this->redirect($this->generateUrl('grupoestudiantebygrupo', array('id' => $entity->getIdGrupo())));
        }
        
        $grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($entity->getIdGrupo());
        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:new.html.twig', array(
            'entity' => $entity,
            'idGrupo' => $grupo->getId(),
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a GrupoEstudiante entity.
    *
    * @param GrupoEstudiante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(GrupoEstudiante $entity)
    {
        $form = $this->createForm(new GrupoEstudianteType($entity->getIdGrupo()), $entity, array(
            'action' => $this->generateUrl('grupoestudiante_create', array( 'idGrupo' => $entity->getIdGrupo())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function create(GrupoEstudiante $entidad, $id)
    {
        $form = $this->createForm(new GrupoEstudianteType($id), $entidad, array(
            'action' => $this->generateUrl('grupoestudiante_create', array( 'idGrupo' => $entidad->getIdGrupo())),
            'method' => 'POST',
        ));
        
        $form->add('submit', 'submit', array('label' => 'Create'));
        
        return $form;
    }

    /**
     * Displays a form to create a new GrupoEstudiante entity.
     *
     */
    public function newAction()
    {
        $entity = new GrupoEstudiante();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new GrupoEstudiante entity.
     *
     */
    public function newasociacionAction($id)
    {
        $entity = new GrupoEstudiante();
        $form = $this->create($entity, $id);
        
        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:new.html.twig', array(
            'entity' => $entity,
            'idGrupo' => $id,
            'form'   => $form->createView(),
        ));
    }
    
    /**
     * Finds and displays a GrupoEstudiante entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->findBy(array(
            'id' => $id
        ));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoEstudiante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:show.html.twig', array(
            'entities'      => $entity,
            'notas' => null,
            'delete_form' => $deleteForm->createView()));
    }

    /**
     * Finds and displays a GrupoEstudiante by estudiante entity.
     *
     */
    public function showbygrupoAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->findBy(array (
            'idGrupo' => $id
        ));
        
        $grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($id);
        $sede = $em->getRepository('ColegioAdminBundle:Sede')->find($grupo->getIdSede());

        $deleteForm = $this->createDeleteForm($id);
                
        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:show.html.twig', array(
            'entities'      => $entity,
            'idGrupo' => $id,
            'notas' => null,
            'idSede' => $sede->getId(),
            'delete_form' => $deleteForm->createView()));
    }
    
    /**
     * Finds and displays a show nota by estudiante entity.
     *
     */
    public function shownotaAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $grupoEstudiante = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->find($id);
        
        $estudiante = $em->getRepository('ColegioEstudianteBundle:Estudiante')->find($grupoEstudiante->getIdEstudiante());
        
        $grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($grupoEstudiante->getIdGrupo());
        $sede = $em->getRepository('ColegioAdminBundle:Sede')->find($grupo->getIdSede());
        $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->findBy(array (
            'idGrupo' => $grupo->getId()
        ));
        
        $nota =  $em->getRepository('ColegioEstudianteBundle:Nota')->findBy(array (
            'idEstudiante' => $estudiante->getId()
        ));
        
        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:show.html.twig', array(
            'entities'      => $entity,
            'idGrupo' => $grupo->getId(),
            'notas' => $nota,
            'idSede' => $sede->getId()));
    }
    
    /**
     * Displays a form to edit an existing GrupoEstudiante entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->find($id);
        $idGrupo = $entity->getIdGrupo();
        $grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($idGrupo);
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoEstudiante entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:edit.html.twig', array(
            'entity'      => $entity,
            'idGrupo' => $grupo->getId(),
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a GrupoEstudiante entity.
    *
    * @param GrupoEstudiante $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GrupoEstudiante $entity)
    {
        $form = $this->createForm(new GrupoEstudianteType($entity->getIdGrupo()), $entity, array(
            'action' => $this->generateUrl('grupoestudiante_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    /**
     * Edits an existing GrupoEstudiante entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->find($id);
        $Grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($entity->getIdGrupo());
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoEstudiante entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            //return $this->redirect($this->generateUrl('grupoestudiante_edit', array('id' => $id)));
        }

        return $this->render('ColegioEstudianteBundle:GrupoEstudiante:edit.html.twig', array(
            'entity'      => $entity,
            'idGrupo' => $Grupo->getId(),
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    /**
     * Deletes a GrupoEstudiante entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioEstudianteBundle:GrupoEstudiante')->find($id);
            $grupo = $em->getRepository('ColegioGrupoBundle:Grupo')->find($entity->getIdGrupo());
            
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GrupoEstudiante entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grupoestudiantebygrupo', array('id' => $grupo->getId())));
    }

    /**
     * Creates a form to delete a GrupoEstudiante entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupoestudiante_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
