<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Colegio\AdminBundle\Entity\Sede;
use Colegio\AdminBundle\Form\SedeType;

/**
 * Sede controller.
 *
 */
class SedeController extends Controller
{

    /**
     * Lists all Sede entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $entities = $em->getRepository('ColegioAdminBundle:Sede')->findColegio($idColegio);
        
        return $this->render('ColegioAdminBundle:Sede:index.html.twig', array(
        'entities'      => $entities));
    }
    /**
     * Creates a new Sede entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Sede();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('sede_show', array('id' => $entity->getId())));
        }

        return $this->render('ColegioAdminBundle:Sede:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Sede entity.
    *
    * @param Sede $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Sede $entity)
    {
        $form = $this->createForm(new SedeType(), $entity, array(
            'action' => $this->generateUrl('sede_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Sede entity.
     *
     */
    public function newAction()
    {
        $entity = new Sede();
        $form   = $this->createCreateForm($entity);

        return $this->render('ColegioAdminBundle:Sede:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Sede entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Sede')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sede entity.');
        }
        
        $direccion = $em->getRepository('ColegioAdminBundle:Direccion')->findBy( array(
            'idSede' => $id
        ));
        
        $rector = $em->getRepository('ColegioAdminBundle:Rector')->findBy( array(
            'idSede' => $id
        ));
        
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Sede:show.html.twig', array(
            'entity'      => $entity,
            'direccion' => $direccion,
            'rector' => $rector,
            'delete_form' => $deleteForm->createView()));
    }

    /**
     * Displays a form to edit an existing Sede entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Sede')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sede entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ColegioAdminBundle:Sede:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Sede entity.
    *
    * @param Sede $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Sede $entity)
    {
        $form = $this->createForm(new SedeType(), $entity, array(
            'action' => $this->generateUrl('sede_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Sede entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ColegioAdminBundle:Sede')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Sede entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('sede_edit', array('id' => $id)));
        }

        return $this->render('ColegioAdminBundle:Sede:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Sede entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ColegioAdminBundle:Sede')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Sede entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('sede'));
    }

    /**
     * Creates a form to delete a Sede entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sede_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
