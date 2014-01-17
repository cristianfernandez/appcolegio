<?php

namespace Colegio\BoletinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\BoletinBundle\Entity\Boletin;
use Colegio\BoletinBundle\Form\BoletinType;

/**
 * Boletin controller.
 *
 */
class BoletinController extends Controller
{

    /**
     * Lists all Boletin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioBoletinBundle:Boletin')->findAll();

        return $this->render('ColegioBoletinBundle:Boletin:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Boletin entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Boletin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');            

            return $this->redirect($this->generateUrl('boletin_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioBoletinBundle:Boletin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Boletin entity.
    *
    * @param Boletin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Boletin $entity)
    {
        $form = $this->createForm(new BoletinType(), $entity, array(
            'action' => $this->generateUrl('boletin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Boletin entity.
     *
     */
    public function newAction()
    {
        $entity = new Boletin();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioBoletinBundle:Boletin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Boletin entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Boletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Boletin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Boletin:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Boletin entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Boletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Boletin entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Boletin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Boletin entity.
    *
    * @param Boletin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Boletin $entity)
    {
        $form = $this->createForm(new BoletinType(), $entity, array(
            'action' => $this->generateUrl('boletin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Boletin entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Boletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Boletin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('boletin_edit', array('id' => $id)));
        }

        return $this->render('ColegioBoletinBundle:Boletin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Boletin entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioBoletinBundle:Boletin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Boletin entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('boletin'));
    }

    /**
     * Creates a form to delete a Boletin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('boletin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
