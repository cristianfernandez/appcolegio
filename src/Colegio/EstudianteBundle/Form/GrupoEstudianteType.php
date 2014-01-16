<?php

namespace Colegio\EstudianteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class GrupoEstudianteType extends AbstractType
{
    public function __construct($idGrupo) 
    {
        $this->idGrupo = $idGrupo;
    }
    
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($this->idGrupo != null)
        {
        $self = $this;
        $builder
            ->add('idEstudiante')
            ->add('idGrupo','entity',array(
                'class'=>'ColegioGrupoBundle:Grupo',
                'query_builder'=> function(EntityRepository $er) use($self){
                       return $er->createQueryBuilder('u')
                               ->where('u.id = :idGrupo')
                               ->setParameter('idGrupo', $self->idGrupo);
                }
            ));
        
        }
        else
        {
            $builder
                ->add('idEstudiante')
                ->add('idGrupo');
        }
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
