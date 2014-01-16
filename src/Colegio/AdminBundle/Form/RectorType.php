<?php

namespace Colegio\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RectorType extends AbstractType
{
    public function __construct($sede)
    {
        $this->sede = $sede;
    } 
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $self = $this; 
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('idSede','entity',array(
                'class' => 'ColegioAdminBundle:Sede',
                'query_builder' => function(EntityRepository $er) use($self){
                        return $er->createQueryBuilder('u')
                                ->where('u.idDetalleColegio = :sede')
                                ->setParameter('sede', $self->sede);
                },
                 'label'=>'Sede',
                 'empty_value'=>'Escoge una sede',
                 'required'=> true,
            ))
            
            ->add('email')
            ->add('telefono')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\AdminBundle\Entity\Rector'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_adminbundle_rector';
    }
}
