<?php

namespace Colegio\GrupoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class AsignaturaType extends AbstractType
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
            ->add('idColegio','entity',array(
                'class'=>'ColegioAdminBundle:Colegio',
                'query_builder' => function(EntityRepository $er) use($self){
                        return $er->createQueryBuilder('u')
                                ->where('u.id = :sede')
                                ->setParameter('sede', $self->sede);
                },
                 'label'=>'Colegio',
                 'required'=> true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\GrupoBundle\Entity\Asignatura'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_grupobundle_asignatura';
    }
}
