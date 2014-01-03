<?php

namespace Colegio\EstudianteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoEstudiante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\EstudianteBundle\Entity\GrupoEstudianteRepository")
 */
class GrupoEstudiante
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Estudiante", type="string", length=255)
     */
    private $idEstudiante;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Grupo", type="string", length=255)
     */
    private $idGrupo;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idEstudiante
     *
     * @param string $idEstudiante
     * @return GrupoEstudiante
     */
    public function setIdEstudiante($idEstudiante)
    {
        $this->idEstudiante = $idEstudiante;
    
        return $this;
    }

    /**
     * Get idEstudiante
     *
     * @return string 
     */
    public function getIdEstudiante()
    {
        return $this->idEstudiante;
    }

    /**
     * Set idGrupo
     *
     * @param string $idGrupo
     * @return GrupoEstudiante
     */
    public function setIdGrupo($idGrupo)
    {
        $this->idGrupo = $idGrupo;
    
        return $this;
    }

    /**
     * Get idGrupo
     *
     * @return string 
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }
}
