<?php

namespace Colegio\GrupoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class GrupoType extends AbstractType
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
            ->add('idNivel')
            ->add('idDocenteResponsable','entity',array(
                'class'=> 'ColegioDocenteBundle:Docente, ColegioAdminBundle:detalleColegio',
                'query_builder'=> function(EntityRepository $er) use($self){
                        return $er->createQueryBuilder('u,d')
                                ->where('d.idColegio = :sede')
                                ->setParameter('sede', $self->sede);
                },
                'label'=> 'Docente Responsable'
            ))
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
            ->add('nombre')
            ->add('activo')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\GrupoBundle\Entity\Grupo'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_grupobundle_grupo';
    }
}
