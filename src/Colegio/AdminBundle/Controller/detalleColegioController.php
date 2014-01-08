<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\detalleColegio;
use Colegio\AdminBundle\Form\detalleColegioType;

/**
 * detalleColegio controller.
 *
 */
class detalleColegioController extends Controller
{

    /**
     * Lists all detalleColegio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:detalleColegio')->findAll();

        return $this->render('ColegioAdminBundle:detalleColegio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new detalleColegio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new detalleColegio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('detallecolegio_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:detalleColegio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a detalleColegio entity.
    *
    * @param detalleColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(detalleColegio $entity)
    {
        $form = $this->createForm(new detalleColegioType(), $entity, array(
            'action' => $this->generateUrl('detallecolegio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new detalleColegio entity.
     *
     */
    public function newAction()
    {
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $entity = new detalleColegio();
        
        $entity->setActualYear('2014');
        $entity->setIdColegio($idColegio);
        $idColegio = null;
        $form = $this->createForm(new detalleColegioType($idColegio), $entity);

        return $this->render('ColegioAdminBundle:detalleColegio:new.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detalleColegio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:detalleColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find detalleColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:detalleColegio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing detalleColegio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:detalleColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find detalleColegio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:detalleColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a detalleColegio entity.
    *
    * @param detalleColegio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(detalleColegio $entity)
    {
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        
        $form = $this->createForm(new detalleColegioType($idColegio), $entity, array(
            'action' => $this->generateUrl('detallecolegio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing detalleColegio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:detalleColegio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find detalleColegio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('detallecolegio_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:detalleColegio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a detalleColegio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:detalleColegio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find detalleColegio entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('detallecolegio'));
    }

    /**
     * Creates a form to delete a detalleColegio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detallecolegio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
