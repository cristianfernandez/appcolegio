<?php

namespace Colegio\BoletinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstudianteBoletin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\BoletinBundle\Entity\EstudianteBoletinRepository")
 */
class EstudianteBoletin
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
     * @ORM\ManyToOne(targetEntity="Colegio\BoletinBundle\Entity\Boletin")
     */
    private $idBoletin;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\BoletinBundle\Entity\Periodo")
     */
    private $idPeriodo;


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
     * @return EstudianteBoletin
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
     * Set idBoletin
     *
     * @param string $idBoletin
     * @return EstudianteBoletin
     */
    public function setIdBoletin(\Colegio\BoletinBundle\Entity\Boletin $idBoletin)
    {
        $this->idBoletin = $idBoletin;
    
        return $this;
    }

    /**
     * Get idBoletin
     *
     * @return string 
     */
    public function getIdBoletin()
    {
        return $this->idBoletin;
    }

    /**
     * Set idPeriodo
     *
     * @param string $idPeriodo
     * @return EstudianteBoletin
     */
    public function setIdPeriodo(\Colegio\BoletinBundle\Entity\Periodo $idPeriodo)
    {
        $this->idPeriodo = $idPeriodo;
    
        return $this;
    }

    /**
     * Get idPeriodo
     *
     * @return string 
     */
    public function getIdPeriodo()
    {
        return $this->idPeriodo;
    }
}
