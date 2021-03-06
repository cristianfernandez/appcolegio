<?php

namespace Colegio\DocenteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Sede")
     */
    private $idSede;

     /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Colegio")
     */
    private $idColegio;
    
    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\ManyToOne(targetEntity="Colegio\GrupoBundle\Entity\Asignatura")
     */
    private $idMateria;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="Nombres", type="string", length=255)
     */
    private $nombres;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="Apellidos", type="string", length=255)
     */
    private $apellidos;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;

    /**
     * @var string
     * @Assert\Email(checkMX=true,message="No es un email válido")
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\EstudianteBundle\Entity\TipoIdentificacion")
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
    public function setIdSede(\Colegio\AdminBundle\Entity\Sede $idSede)
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
     * Set idColegio
     *
     * @param string $idColegio
     * @return Docente
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
    
    /**
     * Set idMateria
     *
     * @param string $idMateria
     * @return Docente
     */
    public function setIdMateria(\Colegio\GrupoBundle\Entity\Asignatura $idMateria)
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
    public function setIdTipoIdentificacion(\Colegio\EstudianteBundle\Entity\TipoIdentificacion $idTipoIdentificacion)
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
