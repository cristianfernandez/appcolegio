<?php

namespace Colegio\EstudianteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ColegioEstudianteBundle:Default:index.html.twig', array('name' => $name));
    }
}
