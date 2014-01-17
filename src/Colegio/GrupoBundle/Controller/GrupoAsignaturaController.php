<?php

namespace Colegio\GrupoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\GrupoBundle\Entity\GrupoAsignatura;
use Colegio\GrupoBundle\Form\GrupoAsignaturaType;

/**
 * GrupoAsignatura controller.
 *
 */
class GrupoAsignaturaController extends Controller
{

    /**
     * Lists all GrupoAsignatura entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioGrupoBundle:GrupoAsignatura')->findAll();

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new GrupoAsignatura entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new GrupoAsignatura();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('grupoasignatura_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a GrupoAsignatura entity.
    *
    * @param GrupoAsignatura $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(GrupoAsignatura $entity)
    {
        $form = $this->createForm(new GrupoAsignaturaType(), $entity, array(
            'action' => $this->generateUrl('grupoasignatura_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new GrupoAsignatura entity.
     *
     */
    public function newAction()
    {
        $entity = new GrupoAsignatura();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a GrupoAsignatura entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioGrupoBundle:GrupoAsignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoAsignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing GrupoAsignatura entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioGrupoBundle:GrupoAsignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoAsignatura entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a GrupoAsignatura entity.
    *
    * @param GrupoAsignatura $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(GrupoAsignatura $entity)
    {
        $form = $this->createForm(new GrupoAsignaturaType(), $entity, array(
            'action' => $this->generateUrl('grupoasignatura_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing GrupoAsignatura entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioGrupoBundle:GrupoAsignatura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find GrupoAsignatura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('grupoasignatura_edit', array('id' => $id)));
        }

        return $this->render('ColegioGrupoBundle:GrupoAsignatura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a GrupoAsignatura entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioGrupoBundle:GrupoAsignatura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find GrupoAsignatura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('grupoasignatura'));
    }

    /**
     * Creates a form to delete a GrupoAsignatura entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('grupoasignatura_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
