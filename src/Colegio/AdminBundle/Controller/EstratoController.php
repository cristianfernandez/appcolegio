<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Estrato;
use Colegio\AdminBundle\Form\EstratoType;

/**
 * Estrato controller.
 *
 */
class EstratoController extends Controller
{

    /**
     * Lists all Estrato entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:Estrato')->findAll();

        return $this->render('ColegioAdminBundle:Estrato:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Estrato entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Estrato();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('estrato_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Estrato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Estrato entity.
    *
    * @param Estrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Estrato $entity)
    {
        $form = $this->createForm(new EstratoType(), $entity, array(
            'action' => $this->generateUrl('estrato_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Estrato entity.
     *
     */
    public function newAction()
    {
        $entity = new Estrato();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Estrato:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Estrato entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Estrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Estrato:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Estrato entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Estrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estrato entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Estrato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Estrato entity.
    *
    * @param Estrato $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Estrato $entity)
    {
        $form = $this->createForm(new EstratoType(), $entity, array(
            'action' => $this->generateUrl('estrato_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Estrato entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Estrato')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Estrato entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('estrato_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Estrato:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Estrato entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Estrato')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Estrato entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('estrato'));
    }

    /**
     * Creates a form to delete a Estrato entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estrato_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
