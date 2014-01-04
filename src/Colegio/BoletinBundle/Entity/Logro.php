<?php

namespace Colegio\BoletinBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logro
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Logro
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
     * @ORM\ManyToOne(targetEntity="Colegio\BoletinBundle\Entity\Boletin")
     */
    private $idBoletin;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;


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
     * Set idBoletin
     *
     * @param string $idBoletin
     * @return Logro
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Logro
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
    
    public function __toString()
    {
        return $this->getDescripcion();
    }
}
