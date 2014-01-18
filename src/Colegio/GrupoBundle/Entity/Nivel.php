<?php

namespace Colegio\GrupoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nivel
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Nivel
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
     * @ORM\Column(name="detalleNivel", type="string", length=255)
     */
    private $detalleNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="codigoNivel", type="string", length=255)
     */
    private $codigoNivel;
    
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
     * Set detalleNivel
     *
     * @param string $detalleNivel
     * @return Nivel
     */
    public function setDetalleNivel($detalleNivel)
    {
        $this->detalleNivel = $detalleNivel;
    
        return $this;
    }

    /**
     * Get detalleNivel
     *
     * @return string 
     */
    public function getDetalleNivel()
    {
        return $this->detalleNivel;
    }
    
    /**
     * Set codigoNivel
     *
     * @param string $codigoNivel
     * @return Nivel
     */
    public function setCodigoNivel($codigoNivel)
    {
        $this->codigoNivel = $codigoNivel;
    
        return $this;
    }

    /**
     * Get codigoNivel
     *
     * @return string 
     */
    public function getCodigoNivel()
    {
        return $this->codigoNivel;
    }
    
    public function __toString()
    {
        return $this->getDetalleNivel();
    }
}
