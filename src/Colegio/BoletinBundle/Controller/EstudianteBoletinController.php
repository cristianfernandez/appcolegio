<?php

namespace Colegio\BoletinBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\BoletinBundle\Entity\EstudianteBoletin;
use Colegio\BoletinBundle\Form\EstudianteBoletinType;

/**
 * EstudianteBoletin controller.
 *
 */
class EstudianteBoletinController extends Controller
{

    /**
     * Lists all EstudianteBoletin entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ColegioBoletinBundle:EstudianteBoletin')->findAll();

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new EstudianteBoletin entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new EstudianteBoletin();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('estudianteboletin_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a EstudianteBoletin entity.
    *
    * @param EstudianteBoletin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(EstudianteBoletin $entity)
    {
        $form = $this->createForm(new EstudianteBoletinType(), $entity, array(
            'action' => $this->generateUrl('estudianteboletin_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new EstudianteBoletin entity.
     *
     */
    public function newAction()
    {
        $entity = new EstudianteBoletin();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a EstudianteBoletin entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:EstudianteBoletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudianteBoletin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing EstudianteBoletin entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:EstudianteBoletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudianteBoletin entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a EstudianteBoletin entity.
    *
    * @param EstudianteBoletin $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(EstudianteBoletin $entity)
    {
        $form = $this->createForm(new EstudianteBoletinType(), $entity, array(
            'action' => $this->generateUrl('estudianteboletin_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing EstudianteBoletin entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioBoletinBundle:EstudianteBoletin')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find EstudianteBoletin entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('estudianteboletin_edit', array('id' => $id)));
        }

        return $this->render('ColegioBoletinBundle:EstudianteBoletin:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a EstudianteBoletin entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioBoletinBundle:EstudianteBoletin')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find EstudianteBoletin entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('estudianteboletin'));
    }

    /**
     * Creates a form to delete a EstudianteBoletin entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('estudianteboletin_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
