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
}
