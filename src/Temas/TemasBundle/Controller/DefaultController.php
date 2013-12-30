<?php

namespace Temas\TemasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TemasTemasBundle:Default:index.html.twig', array('name' => $name));
    }
}
