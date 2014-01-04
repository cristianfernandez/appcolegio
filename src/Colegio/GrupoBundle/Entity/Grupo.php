<?php

namespace Colegio\GrupoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\GrupoBundle\Entity\GrupoRepository")
 */
class Grupo
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
     * @ORM\Column(name="id_Nivel", type="string", length=255)
     */
    private $idNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="id_DocenteResponsable", type="string", length=255)
     */
    private $idDocenteResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Sede", type="string", length=255)
     */
    private $idSede;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean")
     */
    private $activo;


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
     * Set idNivel
     *
     * @param string $idNivel
     * @return Grupo
     */
    public function setIdNivel($idNivel)
    {
        $this->idNivel = $idNivel;
    
        return $this;
    }

    /**
     * Get idNivel
     *
     * @return string 
     */
    public function getIdNivel()
    {
        return $this->idNivel;
    }

    /**
     * Set idDocenteResponsable
     *
     * @param string $idDocenteResponsable
     * @return Grupo
     */
    public function setIdDocenteResponsable($idDocenteResponsable)
    {
        $this->idDocenteResponsable = $idDocenteResponsable;
    
        return $this;
    }

    /**
     * Get idDocenteResponsable
     *
     * @return string 
     */
    public function getIdDocenteResponsable()
    {
        return $this->idDocenteResponsable;
    }

    /**
     * Set idSede
     *
     * @param string $idSede
     * @return Grupo
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
     * Set nombre
     *
     * @param string $nombre
     * @return Grupo
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
     * Set activo
     *
     * @param boolean $activo
     * @return Grupo
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;
    
        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo()
    {
        return $this->activo;
    }
    
    public function __toString()
    {
        return $this->getNombre();
    }
}
