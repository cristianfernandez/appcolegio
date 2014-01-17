<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Direccion;
use Colegio\AdminBundle\Form\DireccionType;

/**
 * Direccion controller.
 *
 */
class DireccionController extends Controller
{

    /**
     * Lists all Direccion entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $entities = $em->getRepository('ColegioAdminBundle:Direccion')->findAll();

        return $this->render('ColegioAdminBundle:Direccion:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Direccion entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Direccion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('direccion_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Direccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Direccion entity.
    *
    * @param Direccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Direccion $entity)
    {
        $form = $this->createForm(new DireccionType(), $entity, array(
            'action' => $this->generateUrl('direccion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Direccion entity.
     *
     */
    public function newAction()
    {
        $entity = new Direccion();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Direccion:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Direccion entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Direccion:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Direccion entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Direccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Direccion entity.
    *
    * @param Direccion $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Direccion $entity)
    {
        $form = $this->createForm(new DireccionType(), $entity, array(
            'action' => $this->generateUrl('direccion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Direccion entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Direccion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Direccion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('direccion_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Direccion:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Direccion entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Direccion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Direccion entity.');
            }

            $em->remove($entity);
            $em->flush();
             $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('direccion'));
    }

    /**
     * Creates a form to delete a Direccion entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('direccion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
