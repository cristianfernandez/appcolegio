<?php

namespace Colegio\BoletinBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ColegioBoletinBundle:Default:index.html.twig', array('name' => $name));
    }
}
