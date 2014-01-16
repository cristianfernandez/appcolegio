<?php

namespace Colegio\GrupoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignatura
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\GrupoBundle\Entity\AsignaturaRepository")
 */
class Asignatura
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
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Colegio")
     */
    private $idColegio;    

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
     * Set nombre
     *
     * @param string $nombre
     * @return Asignatura
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    
    /**
     * Set idColegio
     *
     * @param string $nombre
     * @return Asignatura
     */
    public function setIdColegio(\Colegio\AdminBundle\Entity\Colegio $idColegio)
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
    
    
    
    public function __toString()
    {
        return $this->getNombre();
    }
}
