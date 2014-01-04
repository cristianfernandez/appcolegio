<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Localidad
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Localidad
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
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Municipio")
     */
    private $idMunicipio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreLocalidad", type="string", length=255)
     */
    private $nombreLocalidad;


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
     * Set idMunicipio
     *
     * @param string $idMunicipio
     * @return Localidad
     */
    public function setIdMunicipio(\Colegio\AdminBundle\Entity\Municipio $idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;
    
        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return string 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * Set nombreLocalidad
     *
     * @param string $nombreLocalidad
     * @return Localidad
     */
    public function setNombreLocalidad($nombreLocalidad)
    {
        $this->nombreLocalidad = $nombreLocalidad;
    
        return $this;
    }

    /**
     * Get nombreLocalidad
     *
     * @return string 
     */
    public function getNombreLocalidad()
    {
        return $this->nombreLocalidad;
    }
    
    public function __toString()
    {
        return $this->getNombreLocalidad();
    }
}
