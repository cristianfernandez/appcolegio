<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Municipio;
use Colegio\AdminBundle\Form\MunicipioType;

/**
 * Municipio controller.
 *
 */
class MunicipioController extends Controller
{

    /**
     * Lists all Municipio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioAdminBundle:Municipio')->findAll();

        return $this->render('ColegioAdminBundle:Municipio:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Municipio entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Municipio();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('municipio_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Municipio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Municipio entity.
    *
    * @param Municipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Municipio $entity)
    {
        $form = $this->createForm(new MunicipioType(), $entity, array(
            'action' => $this->generateUrl('municipio_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Municipio entity.
     *
     */
    public function newAction()
    {
        $entity = new Municipio();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Municipio:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Municipio entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Municipio:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Municipio entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Municipio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Municipio entity.
    *
    * @param Municipio $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Municipio $entity)
    {
        $form = $this->createForm(new MunicipioType(), $entity, array(
            'action' => $this->generateUrl('municipio_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Municipio entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Municipio')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Municipio entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('municipio_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Municipio:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Municipio entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Municipio')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Municipio entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('municipio'));
    }

    /**
     * Creates a form to delete a Municipio entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('municipio_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
