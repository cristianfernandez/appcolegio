<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\EstadoColegio;
use Colegio\AdminBundle\Form\EstadoColegioType;

/**
 * EstadoColegio controller.
 *
 */
class EstadoColegioController extends Controller
{

    /**
     * Lists all EstadoColegio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:EstadoColegio')->findAll();

        return $this->render('ColegioAdminBundle:EstadoColegio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EstadoColegio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EstadoColegio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estadocolegio_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:EstadoColegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a EstadoColegio entity.
    *
    * @param EstadoColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EstadoColegio $entity)
    {
        $form = $this->createForm(new EstadoColegioType(), $entity, array(
            'action' => $this->generateUrl('estadocolegio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstadoColegio entity.
     *
     */
    public function newAction()
    {
        $entity = new EstadoColegio();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:EstadoColegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EstadoColegio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:EstadoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:EstadoColegio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing EstadoColegio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:EstadoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoColegio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:EstadoColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EstadoColegio entity.
    *
    * @param EstadoColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstadoColegio $entity)
    {
        $form = $this->createForm(new EstadoColegioType(), $entity, array(
            'action' => $this->generateUrl('estadocolegio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstadoColegio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:EstadoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstadoColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estadocolegio_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:EstadoColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EstadoColegio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:EstadoColegio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstadoColegio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estadocolegio'));
    }

    /**
     * Creates a form to delete a EstadoColegio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estadocolegio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
