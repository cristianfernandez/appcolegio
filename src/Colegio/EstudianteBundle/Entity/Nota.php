<?php

namespace Colegio\EstudianteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nota
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\EstudianteBundle\Entity\NotaRepository")
 */
class Nota
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
     * @ORM\ManyToOne(targetEntity="Colegio\EstudianteBundle\Entity\Estudiante")
     */
    private $idEstudiante;
    
        /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\BoletinBundle\Entity\Periodo")
     */
    private $idPeriodo;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\GrupoBundle\Entity\Asignatura")
     */
    private $idAsignatura;

    /**
     * @var string
     *
     * @ORM\Column(name="calificacion", type="string", length=255)
     */
    private $calificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     */
    private $fecha;


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
     * Get idPeriodo
     *
     * @return integer 
     */
    public function getIdPeriodo()
    {
        return $this->idPeriodo;
    }

        /**
     * Set idPeriodo
     *
     * @param string $idPeriodo
     * @return Nota
     */
    public function setIdPeriodo(\Colegio\BoletinBundle\Entity\Periodo $idPeriodo)
    {
        $this->idPeriodo = $idPeriodo;
    
        return $this;
    }
    
    /**
     * Set idEstudiante
     *
     * @param string $idEstudiante
     * @return Nota
     */
    public function setIdEstudiante(\Colegio\EstudianteBundle\Entity\Estudiante $idEstudiante)
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
     * Set idAsignatura
     *
     * @param string $idAsignatura
     * @return Nota
     */
    public function setIdAsignatura(\Colegio\GrupoBundle\Entity\Asignatura $idAsignatura)
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
     * Set calificacion
     *
     * @param string $calificacion
     * @return Nota
     */
    public function setCalificacion($calificacion)
    {
        $this->calificacion = $calificacion;
    
        return $this;
    }

    /**
     * Get calificacion
     *
     * @return string 
     */
    public function getCalificacion()
    {
        return $this->calificacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Nota
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Nota
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    
        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }
    
    //Método para Cargar un valor por defecto
    public function __toString() 
    {
        return $this->getCalificacion();
    }
}
