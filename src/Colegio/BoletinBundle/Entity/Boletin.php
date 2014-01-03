<?php

namespace Colegio\BoletinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Boletin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\BoletinBundle\Entity\BoletinRepository")
 */
class Boletin
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
     * @ORM\ManyToOne(targetEntity="Colegio\GrupoBundle\Entity\GrupoAsignatura")
     */
    private $idGrupoAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacionFinal", type="string", length=255)
     */
    private $calificacionFinal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="datetime")
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="datetime")
     */
    private $fechaFin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;

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
     * Set idGrupoAsignatura
     *
     * @param string $idGrupoAsignatura
     * @return Boletin
     */
    public function setIdGrupoAsignatura(\Colegio\GrupoBundle\Entity\GrupoAsignatura $idGrupoAsignatura)
    {
        $this->idGrupoAsignatura = $idGrupoAsignatura;
    
        return $this;
    }

    /**
     * Get idGrupoAsignatura
     *
     * @return string 
     */
    public function getIdGrupoAsignatura()
    {
        return $this->idGrupoAsignatura;
    }

    /**
     * Set calificacionFinal
     *
     * @param string $calificacionFinal
     * @return Boletin
     */
    public function setCalificacionFinal($calificacionFinal)
    {
        $this->calificacionFinal = $calificacionFinal;
    
        return $this;
    }

    /**
     * Get calificacionFinal
     *
     * @return string 
     */
    public function getCalificacionFinal()
    {
        return $this->calificacionFinal;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return Boletin
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return Boletin
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Boletin
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    
        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }
}
