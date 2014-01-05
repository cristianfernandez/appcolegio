<?php

namespace Usuarios\UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UsuariosUsuariosBundle:Default:index.html.twig', array('name' => $name));
    }
}
