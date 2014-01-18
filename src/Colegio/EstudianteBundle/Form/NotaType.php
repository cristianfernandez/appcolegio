<?php

namespace Colegio\EstudianteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NotaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idAsignatura')
            ->add('calificacion')
            ->add('descripcion')
            ->add('fecha')
            ->add('idEstudiante')
            ->add('idPeriodo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\EstudianteBundle\Entity\Nota'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_estudiantebundle_nota';
    }
}
