<?php

namespace Colegio\EstudianteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\EstudianteBundle\Entity\Nota;
use Colegio\EstudianteBundle\Form\NotaType;

/**
 * Nota controller.
 *
 */
class NotaController extends Controller
{

    /**
     * Lists all Nota entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioEstudianteBundle:Nota')->findAll();

        return $this->render('ColegioEstudianteBundle:Nota:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Nota entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Nota();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('nota_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioEstudianteBundle:Nota:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Nota entity.
    *
    * @param Nota $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Nota $entity)
    {
        $form = $this->createForm(new NotaType(), $entity, array(
            'action' => $this->generateUrl('nota_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Nota entity.
     *
     */
    public function newAction()
    {
        $entity = new Nota();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioEstudianteBundle:Nota:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Nota entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:Nota')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nota entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioEstudianteBundle:Nota:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Nota entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:Nota')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nota entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioEstudianteBundle:Nota:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Nota entity.
    *
    * @param Nota $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Nota $entity)
    {
        $form = $this->createForm(new NotaType(), $entity, array(
            'action' => $this->generateUrl('nota_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Nota entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioEstudianteBundle:Nota')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Nota entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('nota_edit', array('id' => $id)));
        }

        return $this->render('ColegioEstudianteBundle:Nota:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Nota entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioEstudianteBundle:Nota')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Nota entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('nota'));
    }

    /**
     * Creates a form to delete a Nota entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('nota_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
