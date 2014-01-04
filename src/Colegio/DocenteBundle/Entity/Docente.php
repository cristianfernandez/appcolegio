<?php

namespace Colegio\DocenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Docente
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\DocenteBundle\Entity\DocenteRepository")
 */
class Docente
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
     * @ORM\Column(name="id_Sede", type="string", length=255)
     */
    private $idSede;

    /**
     * @var string
     *
     * @ORM\Column(name="id_Materia", type="string", length=255)
     */
    private $idMateria;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombres", type="string", length=255)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="Apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="id_TipoIdentificacion", type="string", length=255)
     */
    private $idTipoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroIdentificacion", type="string", length=255)
     */
    private $numeroIdentificacion;

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
     * Set idSede
     *
     * @param string $idSede
     * @return Docente
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
     * Set idMateria
     *
     * @param string $idMateria
     * @return Docente
     */
    public function setIdMateria($idMateria)
    {
        $this->idMateria = $idMateria;
    
        return $this;
    }

    /**
     * Get idMateria
     *
     * @return string 
     */
    public function getIdMateria()
    {
        return $this->idMateria;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Docente
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Docente
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Docente
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Docente
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set idTipoIdentificacion
     *
     * @param string $idTipoIdentificacion
     * @return Docente
     */
    public function setIdTipoIdentificacion($idTipoIdentificacion)
    {
        $this->idTipoIdentificacion = $idTipoIdentificacion;
    
        return $this;
    }

    /**
     * Get idTipoIdentificacion
     *
     * @return string 
     */
    public function getIdTipoIdentificacion()
    {
        return $this->idTipoIdentificacion;
    }

    /**
     * Set numeroIdentificacion
     *
     * @param string $numeroIdentificacion
     * @return Docente
     */
    public function setNumeroIdentificacion($numeroIdentificacion)
    {
        $this->numeroIdentificacion = $numeroIdentificacion;
    
        return $this;
    }

    /**
     * Get numeroIdentificacion
     *
     * @return string 
     */
    public function getNumeroIdentificacion()
    {
        return $this->numeroIdentificacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Docente
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
    
    public function __toString()
    {
        return $this->getNombres()." ".$this->getApellidos();
    }
}
