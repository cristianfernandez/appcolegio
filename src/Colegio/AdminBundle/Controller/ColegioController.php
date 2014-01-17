<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Colegio;
use Colegio\AdminBundle\Form\ColegioType;

/**
 * Colegio controller.
 *
 */
class ColegioController extends Controller
{

    /**
     * Lists all Colegio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:Colegio')->findAll();

        return $this->render('ColegioAdminBundle:Colegio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Colegio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Colegio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('colegio_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Colegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Colegio entity.
    *
    * @param Colegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Colegio $entity)
    {
        $form = $this->createForm(new ColegioType(), $entity, array(
            'action' => $this->generateUrl('colegio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Colegio entity.
     *
     */
    public function newAction()
    {
        $entity = new Colegio();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Colegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Colegio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Colegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Colegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Colegio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Colegio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Colegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Colegio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Colegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Colegio entity.
    *
    * @param Colegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Colegio $entity)
    {
        $form = $this->createForm(new ColegioType(), $entity, array(
            'action' => $this->generateUrl('colegio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Colegio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Colegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Colegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('colegio_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Colegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Colegio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Colegio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Colegio entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('colegio'));
    }

    /**
     * Creates a form to delete a Colegio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('colegio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
