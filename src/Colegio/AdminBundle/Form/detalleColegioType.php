<?php

namespace Colegio\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class detalleColegioType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idColegio')
            ->add('idSede')
            ->add('actualYear')
            ->add('capacidades')
            ->add('discapacidades')
            ->add('modeloEducativo')
            ->add('idJornada')
            ->add('idRector')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\AdminBundle\Entity\detalleColegio'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_adminbundle_detallecolegio';
    }
}
