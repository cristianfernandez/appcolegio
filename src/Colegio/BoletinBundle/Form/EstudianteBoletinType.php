<?php

namespace Colegio\BoletinBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EstudianteBoletinType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idEstudiante')
            ->add('idBoletin')
            ->add('idPeriodo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\BoletinBundle\Entity\EstudianteBoletin'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_boletinbundle_estudianteboletin';
    }
}
