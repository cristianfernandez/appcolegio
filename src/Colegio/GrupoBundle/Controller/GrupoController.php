<?php

namespace Colegio\GrupoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\GrupoBundle\Entity\Grupo;
use Colegio\GrupoBundle\Form\GrupoType;
use Colegio\AdminBundle\Entity\Sede;

/**
 * Grupo controller.
 *
 */
class GrupoController extends Controller
{

    /**
     * Lists all Grupo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();

        $entities = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        
        return $this->render('ColegioGrupoBundle:Grupo:index.html.twig', array(
            'entities' => $entities,
            'grupos' => null
        ));
    }
    /**
     * Creates a new Grupo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Grupo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('grupo_showbysede', array('id' => $entity->getIdSede())));
        }

        return $this->render('ColegioGrupoBundle:Grupo:new.html.twig', array(
            'entities' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Grupo entity.
    *
    * @param Grupo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Grupo $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $sedeactual = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        $form = $this->createForm(new GrupoType($sedeactual), $entity, array(
            'action' => $this->generateUrl('grupo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Grupo entity.
     *
     */
    public function newAction()
    {
        $entity = new Grupo();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioGrupoBundle:Grupo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Grupo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ColegioGrupoBundle:Grupo')->findBy(array(
            'idSede' => $id
        ));

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioGrupoBundle:Grupo:show.html.twig', array(
            'entities' => $entity,
            'grupos' => null,
            'delete_form' => $deleteForm->createView()));
    }
    
    public function groupBySedeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
       
        $entities = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        $grupos = $em ->getRepository('ColegioGrupoBundle:Grupo')->findBy(array(
            'idSede' => $id
        ));
        
        return $this->render('ColegioGrupoBundle:Grupo:index.html.twig', array(
            'entities' => $entities,
            'grupos' => $grupos));
    }
    /**
     * Displays a form to edit an existing Grupo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioGrupoBundle:Grupo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioGrupoBundle:Grupo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Grupo entity.
    *
    * @param Grupo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Grupo $entity)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $sedeactual = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        $form = $this->createForm(new GrupoType($sedeactual), $entity, array(
            'action' => $this->generateUrl('grupo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Grupo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioGrupoBundle:Grupo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Grupo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('grupo_edit', array('id' => $id)));
        }

        return $this->render('ColegioGrupoBundle:Grupo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Grupo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioGrupoBundle:Grupo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Grupo entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grupo'));
    }

    /**
     * Creates a form to delete a Grupo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
