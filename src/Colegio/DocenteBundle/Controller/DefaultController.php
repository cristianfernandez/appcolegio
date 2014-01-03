<?php

namespace Colegio\DocenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ColegioDocenteBundle:Default:index.html.twig');
    }
}
