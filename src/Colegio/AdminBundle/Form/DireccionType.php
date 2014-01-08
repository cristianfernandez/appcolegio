<?php

namespace Colegio\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DireccionType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('direccionCompleta')
            ->add('idSede')
            ->add('idDepartamento')
            ->add('idMunicipio')
            ->add('idLocalidad')
            ->add('idEstrato')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\AdminBundle\Entity\Direccion'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_adminbundle_direccion';
    }
}
