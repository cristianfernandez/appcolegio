<?php

namespace Colegio\GrupoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GrupoAsignatura
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\GrupoBundle\Entity\GrupoAsignaturaRepository")
 */
class GrupoAsignatura
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
     * @ORM\Column(name="id_Grupo", type="string", length=255)
     */
    private $idGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Asignatura", type="string", length=255)
     */
    private $idAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Docente", type="string", length=255)
     */
    private $idDocente;


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
     * Set idGrupo
     *
     * @param string $idGrupo
     * @return GrupoAsignatura
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

    /**
     * Set idAsignatura
     *
     * @param string $idAsignatura
     * @return GrupoAsignatura
     */
    public function setIdAsignatura($idAsignatura)
    {
        $this->idAsignatura = $idAsignatura;
    
        return $this;
    }

    /**
     * Get idAsignatura
     *
     * @return string 
     */
    public function getIdAsignatura()
    {
        return $this->idAsignatura;
    }

    /**
     * Set idDocente
     *
     * @param string $idDocente
     * @return GrupoAsignatura
     */
    public function setIdDocente($idDocente)
    {
        $this->idDocente = $idDocente;
    
        return $this;
    }

    /**
     * Get idDocente
     *
     * @return string 
     */
    public function getIdDocente()
    {
        return $this->idDocente;
    }
    
    public function __toString() 
    {
        return $this->getIdGrupo();
    }
}
