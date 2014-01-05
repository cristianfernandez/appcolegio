<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Jornada;
use Colegio\AdminBundle\Form\JornadaType;

/**
 * Jornada controller.
 *
 */
class JornadaController extends Controller
{

    /**
     * Lists all Jornada entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:Jornada')->findAll();

        return $this->render('ColegioAdminBundle:Jornada:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Jornada entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Jornada();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('jornada_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Jornada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Jornada entity.
    *
    * @param Jornada $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Jornada $entity)
    {
        $form = $this->createForm(new JornadaType(), $entity, array(
            'action' => $this->generateUrl('jornada_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Jornada entity.
     *
     */
    public function newAction()
    {
        $entity = new Jornada();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Jornada:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Jornada entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Jornada:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Jornada entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Jornada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Jornada entity.
    *
    * @param Jornada $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Jornada $entity)
    {
        $form = $this->createForm(new JornadaType(), $entity, array(
            'action' => $this->generateUrl('jornada_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Jornada entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Jornada')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Jornada entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('jornada_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Jornada:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Jornada entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Jornada')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Jornada entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('jornada'));
    }

    /**
     * Creates a form to delete a Jornada entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('jornada_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
