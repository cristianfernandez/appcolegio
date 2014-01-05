<?php

namespace Usuarios\UsuariosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuariosType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('password','repeated',array(
               'type' => 'password',
               'invalid_message' => 'Las contraseñas deben coincidir',
               'options' => array('label' => 'Contraseña'),
                 ))
            ->add('estado')
            ->add('fechaAlta')
            ->add('role')
            ->add('idColegio')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Usuarios\UsuariosBundle\Entity\Usuarios'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'usuarios_usuariosbundle_usuarios';
    }
}
