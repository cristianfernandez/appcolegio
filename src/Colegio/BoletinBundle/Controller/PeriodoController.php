<?php

namespace Colegio\BoletinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\BoletinBundle\Entity\Periodo;
use Colegio\BoletinBundle\Form\PeriodoType;

/**
 * Periodo controller.
 *
 */
class PeriodoController extends Controller
{

    /**
     * Lists all Periodo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioBoletinBundle:Periodo')->findAll();

        return $this->render('ColegioBoletinBundle:Periodo:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Periodo entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Periodo();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('periodo_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioBoletinBundle:Periodo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Periodo entity.
    *
    * @param Periodo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Periodo $entity)
    {
        $form = $this->createForm(new PeriodoType(), $entity, array(
            'action' => $this->generateUrl('periodo_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Periodo entity.
     *
     */
    public function newAction()
    {
        $entity = new Periodo();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioBoletinBundle:Periodo:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Periodo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Periodo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Periodo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Periodo:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Periodo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Periodo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Periodo entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:Periodo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Periodo entity.
    *
    * @param Periodo $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Periodo $entity)
    {
        $form = $this->createForm(new PeriodoType(), $entity, array(
            'action' => $this->generateUrl('periodo_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Periodo entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:Periodo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Periodo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            return $this->redirect($this->generateUrl('periodo_edit', array('id' => $id)));
        }

        return $this->render('ColegioBoletinBundle:Periodo:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Periodo entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioBoletinBundle:Periodo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Periodo entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'notice',
            'Bien hecho!');
            }

        return $this->redirect($this->generateUrl('periodo'));
    }

    /**
     * Creates a form to delete a Periodo entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('periodo_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
