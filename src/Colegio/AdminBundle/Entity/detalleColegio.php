<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * detalleColegio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\detalleColegioRepository")
 */
class detalleColegio
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
     * @ORM\Column(name="id_colegio", type="string", length=255)
     */
    private $idColegio;

    /**
     * @var string
     *
     * @ORM\Column(name="id_sede", type="string", length=255)
     */
    private $idSede;

    /**
     * @var string
     *
     * @ORM\Column(name="id_jornada", type="string", length=255)
     */
    private $idJornada;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Rector", type="string", length=255)
     */
    private $idRector;

    /**
     * @var string
     *
     * @ORM\Column(name="actualYear", type="string", length=255)
     */
    private $actualYear;

    /**
     * @var string
     *
     * @ORM\Column(name="capacidades", type="string", length=255)
     */
    private $capacidades;

    /**
     * @var string
     *
     * @ORM\Column(name="Discapacidades", type="string", length=255)
     */
    private $discapacidades;

    /**
     * @var string
     *
     * @ORM\Column(name="modeloEducativo", type="string", length=255)
     */
    private $modeloEducativo;


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
     * Set idColegio
     *
     * @param string $idColegio
     * @return detalleColegio
     */
    public function setIdColegio($idColegio)
    {
        $this->idColegio = $idColegio;
    
        return $this;
    }

    /**
     * Get idColegio
     *
     * @return string 
     */
    public function getIdColegio()
    {
        return $this->idColegio;
    }

    /**
     * Set idSede
     *
     * @param string $idSede
     * @return detalleColegio
     */
    public function setIdSede($idSede)
    {
        $this->idSede = $idSede;
    
        return $this;
    }

    /**
     * Get idSede
     *
     * @return string 
     */
    public function getIdSede()
    {
        return $this->idSede;
    }

    /**
     * Set idJornada
     *
     * @param string $idJornada
     * @return detalleColegio
     */
    public function setIdJornada($idJornada)
    {
        $this->idJornada = $idJornada;
    
        return $this;
    }

    /**
     * Get idJornada
     *
     * @return string 
     */
    public function getIdJornada()
    {
        return $this->idJornada;
    }

    /**
     * Set idRector
     *
     * @param string $idRector
     * @return detalleColegio
     */
    public function setIdRector($idRector)
    {
        $this->idRector = $idRector;
    
        return $this;
    }

    /**
     * Get idRector
     *
     * @return string 
     */
    public function getIdRector()
    {
        return $this->idRector;
    }

    /**
     * Set actualYear
     *
     * @param string $actualYear
     * @return detalleColegio
     */
    public function setActualYear($actualYear)
    {
        $this->actualYear = $actualYear;
    
        return $this;
    }

    /**
     * Get actualYear
     *
     * @return string 
     */
    public function getActualYear()
    {
        return $this->actualYear;
    }

    /**
     * Set capacidades
     *
     * @param string $capacidades
     * @return detalleColegio
     */
    public function setCapacidades($capacidades)
    {
        $this->capacidades = $capacidades;
    
        return $this;
    }

    /**
     * Get capacidades
     *
     * @return string 
     */
    public function getCapacidades()
    {
        return $this->capacidades;
    }

    /**
     * Set discapacidades
     *
     * @param string $discapacidades
     * @return detalleColegio
     */
    public function setDiscapacidades($discapacidades)
    {
        $this->discapacidades = $discapacidades;
    
        return $this;
    }

    /**
     * Get discapacidades
     *
     * @return string 
     */
    public function getDiscapacidades()
    {
        return $this->discapacidades;
    }

    /**
     * Set modeloEducativo
     *
     * @param string $modeloEducativo
     * @return detalleColegio
     */
    public function setModeloEducativo($modeloEducativo)
    {
        $this->modeloEducativo = $modeloEducativo;
    
        return $this;
    }

    /**
     * Get modeloEducativo
     *
     * @return string 
     */
    public function getModeloEducativo()
    {
        return $this->modeloEducativo;
    }
}