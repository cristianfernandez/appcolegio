<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Colegio\AdminBundle\Entity\Colegio;
use Colegio\AdminBundle\Entity\detalleColegio;
use Colegio\AdminBundle\Entity\Direccion;
use Colegio\AdminBundle\Form\detalleColegioType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ColegioAdminBundle:Default:index.html.twig');
    }
    
    public function perfilAction()
    {
        $usuarioActivo = $this->get('security.context')->getToken()->getUser();
        $idColegio = $usuarioActivo->getIdColegio();
        $em = $this->getDoctrine()->getManager();
        
        $entities = $em->getRepository('ColegioAdminBundle:Colegio')->findBy(array (
            'id' => $idColegio
        ));
        $sedes = $em->getRepository('ColegioAdminBundle:Sede')->findBy(array (
            'idDetalleColegio' => $idColegio,
        ));  
        
        return $this->render('ColegioAdminBundle:Colegio:index.html.twig', array(
            'entities' => $entities,
            'sedes' => $sedes,
        ));
    }
}
