<?php

namespace Tucolegio\PpalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TucolegioPpalBundle:Default:index.html.twig');
    }
    
     public function conocenosAction()
    {
        return $this->render('TucolegioPpalBundle:Default:conocenos.html.twig');
    }
}
