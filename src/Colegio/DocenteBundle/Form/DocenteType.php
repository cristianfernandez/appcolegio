<?php

namespace Colegio\DocenteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class DocenteType extends AbstractType
{
    public function __construct($sede)
    {
        //recibe el idcolegio del usuario activo, no la sede como aparenta
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
                ->add('idColegio','entity',array(
                'class'=>'ColegioAdminBundle:Colegio',
                'query_builder'=>function(EntityRepository $er) use($self){
                        return $er->createQueryBuilder('d')
                                ->where('d.id = :sede')
                                ->setParameter('sede',$self->sede);
                },
                'label'=>'Colegio',
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
            ->add('idMateria','entity',array(
                'class' => 'ColegioGrupoBundle:Asignatura',
                'query_builder' => function(EntityRepository $er) use($self){
                        return $er->createQueryBuilder('p')
                                ->where('p.idColegio = :sede')
                                ->setParameter('sede', $self->sede);
                },
                 'label'=>'Materia',
                 'empty_value'=>'Escoge la materia',
                 'required'=> true,
            ))
            ->add('nombres')
            ->add('apellidos')
            ->add('telefono')
            ->add('email')
            ->add('idTipoIdentificacion')
            ->add('numeroIdentificacion')
            ->add('estado')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Colegio\DocenteBundle\Entity\Docente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'colegio_docentebundle_docente';
    }
}
