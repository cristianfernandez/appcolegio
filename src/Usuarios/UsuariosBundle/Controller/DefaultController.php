<?php

namespace Usuarios\UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UsuariosUsuariosBundle:Default:index.html.twig');
    }
    
    public function loginAction()
    {
        $peticion = $this->getRequest();
        $sesion = $peticion->getSession();
        $error = $peticion->attributes->get(
             SecurityContext::AUTHENTICATION_ERROR,
             $sesion->get(SecurityContext::AUTHENTICATION_ERROR)
             );
        return $this->render('UsuariosUsuariosBundle:Default:login.html.twig', array(
            'error' => $error
        ));
    }
    
    public function perfilAction()
    {
        
        //obtener datos del usuario logueado y utizarlos para llenar el formu de registro
        $usuarios = $this->get('security.context')->getToken()->getUser();
        $formulario = $this->createForm(new UsuariosType(), $usuarios);
        //si la petición es GET, mostrar formulario
        //si la petición es POST, actualizar info del usuario con nuevos datos del formulario
        $peticion = $this->getRequest();
        if($peticion->getMethod() == 'POST'){
            $passwordOriginal = $formulario->getData()->getPassword(); //atrapar el pass
            $formulario->bind($peticion);//Recuerda que en los ejemplos usan bindRequest
            
            if($formulario->isValid()){
                if(null == $usuarios->getPassword()){
                    $usuarios->setPassword($passwordOriginal);
                }
                else{
                    $encoder = $this->get('security.encoder_factory')
                                    ->getEncoder($usuarios);
                    $passwordCodificado = $encoder->encodePassword(
                            $usuarios -> getPassword(),
                            $usuarios -> getSalt()
                    );
                    $usuarios->setPassword($passwordCodificado);
                }
                $errores = $this->get('validator')->validate($formulario);
                //actualizamos el perfil del usuario
                $em = $this->getDoctrine()->getManager();
                $em->persist($usuarios);
                $em->flush();
                
                //$this->getUser()->setFlash('notice','Actualizado');
                return $this->redirect($this->generateUrl('backsedes_perfil'));
            }
        }
        //si no es post entonces es GET, le pintamos un formu
        return $this->render('EscaleraBacksedesBundle:Backsedes:perfil.html.twig',array(
            'usuarios'   => $usuarios,
            'formulario' => $formulario->createView()
        ));
    }
}
