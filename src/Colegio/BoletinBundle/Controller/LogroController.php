<?php

namespace Colegio\BoletinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\BoletinBundle\Entity\Logro;
use Colegio\BoletinBundle\Form\LogroType;

/**
 * Logro controller.
 *
 */
class LogroController extends Controller
{

    /**
     * Lists all Logro entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioBoletinBundle:Logro')->findAll();

        return $this->render('ColegioBoletinBundle:Logro:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Logro entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Logro();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('logro_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioBoletinBundle:Logro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Logro entity.
    *
    * @param Logro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Logro $entity)
    {
        $form = $this->createForm(new LogroType(), $entity, array(
            'action' => $this->generateUrl('logro_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Logro entity.
     *
     */
    public function newAction()
    {
        $entity = new Logro();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioBoletinBundle:Logro:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Logro entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Logro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Logro:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Logro entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Logro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logro entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Logro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Logro entity.
    *
    * @param Logro $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Logro $entity)
    {
        $form = $this->createForm(new LogroType(), $entity, array(
            'action' => $this->generateUrl('logro_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Logro entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Logro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Logro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('logro_edit', array('id' => $id)));
        }

        return $this->render('ColegioBoletinBundle:Logro:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Logro entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioBoletinBundle:Logro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Logro entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');     
            }

        return $this->redirect($this->generateUrl('logro'));
    }

    /**
     * Creates a form to delete a Logro entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('logro_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
