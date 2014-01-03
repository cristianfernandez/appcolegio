<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sede
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\SedeRepository")
 */
class Sede
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
     * @ORM\Column(name="id_DetalleColegio", type="string", length=255)
     */
    private $idDetalleColegio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreSede", type="string", length=255)
     */
    private $nombreSede;

    /**
     * @var boolean
     *
     * @ORM\Column(name="estado", type="boolean")
     */
    private $estado;


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
     * Set idDetalleColegio
     *
     * @param string $idDetalleColegio
     * @return Sede
     */
    public function setIdDetalleColegio($idDetalleColegio)
    {
        $this->idDetalleColegio = $idDetalleColegio;
    
        return $this;
    }

    /**
     * Get idDetalleColegio
     *
     * @return string 
     */
    public function getIdDetalleColegio()
    {
        return $this->idDetalleColegio;
    }

    /**
     * Set nombreSede
     *
     * @param string $nombreSede
     * @return Sede
     */
    public function setNombreSede($nombreSede)
    {
        $this->nombreSede = $nombreSede;
    
        return $this;
    }

    /**
     * Get nombreSede
     *
     * @return string 
     */
    public function getNombreSede()
    {
        return $this->nombreSede;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Sede
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }
}
