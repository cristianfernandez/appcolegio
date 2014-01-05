<?php

namespace Colegio\GrupoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GrupoAsignaturaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idGrupo')
            ->add('idAsignatura')
            ->add('idDocente')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\GrupoBundle\Entity\GrupoAsignatura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_grupobundle_grupoasignatura';
    }
}
