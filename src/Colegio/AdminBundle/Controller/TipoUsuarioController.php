<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\TipoUsuario;
use Colegio\AdminBundle\Form\TipoUsuarioType;

/**
 * TipoUsuario controller.
 *
 */
class TipoUsuarioController extends Controller
{

    /**
     * Lists all TipoUsuario entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:TipoUsuario')->findAll();

        return $this->render('ColegioAdminBundle:TipoUsuario:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoUsuario entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoUsuario();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tipousuario_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:TipoUsuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TipoUsuario entity.
    *
    * @param TipoUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TipoUsuario $entity)
    {
        $form = $this->createForm(new TipoUsuarioType(), $entity, array(
            'action' => $this->generateUrl('tipousuario_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoUsuario entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoUsuario();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:TipoUsuario:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoUsuario entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:TipoUsuario:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TipoUsuario entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoUsuario entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:TipoUsuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoUsuario entity.
    *
    * @param TipoUsuario $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoUsuario $entity)
    {
        $form = $this->createForm(new TipoUsuarioType(), $entity, array(
            'action' => $this->generateUrl('tipousuario_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoUsuario entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoUsuario')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoUsuario entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tipousuario_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:TipoUsuario:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoUsuario entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:TipoUsuario')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoUsuario entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tipousuario'));
    }

    /**
     * Creates a form to delete a TipoUsuario entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipousuario_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
