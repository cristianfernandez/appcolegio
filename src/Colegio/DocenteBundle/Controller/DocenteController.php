<?php

namespace Colegio\DocenteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\DocenteBundle\Entity\Docente;
use Colegio\DocenteBundle\Form\DocenteType;

/**
 * Docente controller.
 *
 */
class DocenteController extends Controller
{

    /**
     * Lists all Docente entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        if($idColegio == null){
        $entities = $em->getRepository('ColegioDocenteBundle:Docente')->findAll();
        }else{
        $sede = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        $entities = $em->getRepository('ColegioDocenteBundle:Docente')->findByidSede($sede);
        }
        return $this->render('ColegioDocenteBundle:Docente:index.html.twig', array(
            'entities' => $entities,
            'grupos'   => null,
            'profe'    => null,
        ));
    }
    /**
     * Creates a new Docente entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Docente();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('docente_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioDocenteBundle:Docente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Docente entity.
    *
    * @param Docente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Docente $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $form = $this->createForm(new DocenteType($idColegio), $entity, array(
            'action' => $this->generateUrl('docente_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Docente entity.
     *
     */
    public function newAction()
    {
        $entity = new Docente();
        $form   = $this->createCreateForm($entity);
        
        return $this->render('ColegioDocenteBundle:Docente:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Docente entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Docente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioDocenteBundle:Docente:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

       /**
     * Encuentra los grupos de un docente.
     *
     */
    public function gruposAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        if($idColegio != null){
        $sede = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        $entity  = $em->getRepository('ColegioDocenteBundle:Docente')->findByidSede($sede);
        $entity2 = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);
        $grupos  = $em->getRepository('ColegioGrupoBundle:Grupo')->findByidDocenteResponsable($id);
        }else{
        $entity  = $em->getRepository('ColegioDocenteBundle:Docente')->findAll();
        $entity2 = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);
        $grupos  = $em->getRepository('ColegioGrupoBundle:Grupo')->findByidDocenteResponsable($id);
        }
        
         
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Docente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioDocenteBundle:Docente:index.html.twig', array(
            'entities'    => $entity,
            'delete_form' => $deleteForm->createView(), 
            'grupos'      => $grupos,
            'profe'       => $entity2,
            ));
    }
    
    
    /**
     * Displays a form to edit an existing Docente entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Docente entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioDocenteBundle:Docente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Docente entity.
    *
    * @param Docente $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Docente $entity)
    {
        $form = $this->createForm(new DocenteType(), $entity, array(
            'action' => $this->generateUrl('docente_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Docente entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Docente entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->geneAllrateUrl('docente_edit', array('id' => $id)));
        }

        return $this->render('ColegioDocenteBundle:Docente:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Docente entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioDocenteBundle:Docente')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Docente entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('docente'));
    }

    /**
     * Creates a form to delete a Docente entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('docente_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
