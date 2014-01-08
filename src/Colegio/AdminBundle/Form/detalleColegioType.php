<?php

namespace Colegio\AdminBundle\Form;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\SecurityContext;

class detalleColegioType extends AbstractType
{
    public function __construct($idColegio) 
    {
        $this->idColegio = $idColegio;
    }
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {      
        $self = $this;
        if ($this->idColegio == null)
        {
            $builder
            ->add('idColegio')            
            ->add('actualYear')
            ->add('capacidades')
            ->add('discapacidades')
            ->add('modeloEducativo')
            ->add('idJornada')
            ->add('idRector')
            ->add('crear', 'submit');
        }
        else
        {
            $builder
            ->add('idColegio', 'entity', array(
                'class'=> 'ColegioAdminBundle:Colegio', 
                'query_builder'=>function(EntityRepository $er) use($self){
                    return $er->CreateQueryBuilder('u')
                            ->where('u.id = :idColegio')
                            ->setParameter('idColegio',$self->idColegio);
                },
                 'label'      => 'Mi colegio',
                 'empty_value'=> 'Tienes q escoger tu colegio',
                 'required'   =>true))            
            ->add('actualYear')
            ->add('capacidades')
            ->add('discapacidades')
            ->add('modeloEducativo')
            ->add('idJornada')
            ->add('idRector')
            ->add('crear', 'submit');
        }
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
