<?php

namespace Colegio\BoletinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoletinType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('calificacionFinal')
            ->add('fechaInicio')
            ->add('fechaFin')
            ->add('activo')
            ->add('idGrupoAsignatura')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\BoletinBundle\Entity\Boletin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_boletinbundle_boletin';
    }
}
