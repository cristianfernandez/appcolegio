<?php

namespace Colegio\EstudianteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrupoEstudianteType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEstudiante')
            ->add('idGrupo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\EstudianteBundle\Entity\GrupoEstudiante'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_estudiantebundle_grupoestudiante';
    }
}
