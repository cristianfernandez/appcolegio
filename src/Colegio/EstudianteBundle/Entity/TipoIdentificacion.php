<?php

namespace Colegio\EstudianteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoIdentificacion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class TipoIdentificacion
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
     * @ORM\Column(name="tipoIdentificacion", type="string", length=255)
     */
    private $tipoIdentificacion;


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
     * Set tipoIdentificacion
     *
     * @param string $tipoIdentificacion
     * @return TipoIdentificacion
     */
    public function setTipoIdentificacion($tipoIdentificacion)
    {
        $this->tipoIdentificacion = $tipoIdentificacion;
    
        return $this;
    }

    /**
     * Get tipoIdentificacion
     *
     * @return string 
     */
    public function getTipoIdentificacion()
    {
        return $this->tipoIdentificacion;
    }
    
    public function __toString()
    {
        return $this->getTipoIdentificacion();
    }
}
