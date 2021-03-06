<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\TipoColegio;
use Colegio\AdminBundle\Form\TipoColegioType;

/**
 * TipoColegio controller.
 *
 */
class TipoColegioController extends Controller
{

    /**
     * Lists all TipoColegio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:TipoColegio')->findAll();

        return $this->render('ColegioAdminBundle:TipoColegio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new TipoColegio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new TipoColegio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('tipocolegio_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:TipoColegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a TipoColegio entity.
    *
    * @param TipoColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(TipoColegio $entity)
    {
        $form = $this->createForm(new TipoColegioType(), $entity, array(
            'action' => $this->generateUrl('tipocolegio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new TipoColegio entity.
     *
     */
    public function newAction()
    {
        $entity = new TipoColegio();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:TipoColegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a TipoColegio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:TipoColegio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing TipoColegio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoColegio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:TipoColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a TipoColegio entity.
    *
    * @param TipoColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(TipoColegio $entity)
    {
        $form = $this->createForm(new TipoColegioType(), $entity, array(
            'action' => $this->generateUrl('tipocolegio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing TipoColegio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:TipoColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find TipoColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('tipocolegio_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:TipoColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a TipoColegio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:TipoColegio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find TipoColegio entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('tipocolegio'));
    }

    /**
     * Creates a form to delete a TipoColegio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('tipocolegio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
