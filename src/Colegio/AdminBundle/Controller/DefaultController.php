<?php

namespace Colegio\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ColegioAdminBundle:Default:index.html.twig', array('name' => $name));
    }
}
