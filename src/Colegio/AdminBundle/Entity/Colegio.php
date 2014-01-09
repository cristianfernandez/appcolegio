<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Colegio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\ColegioRepository")
 */
class Colegio
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
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\EstadoColegio")
     */
    private $idEstadoColegio;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\TipoColegio")
     */
    private $idTipoColegio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=255)
     */
    private $telefono;


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
     * Set idDireccion
     *
     * @param string $idDireccion
     * @return Colegio
     */
    public function setIdDireccion($idDireccion)
    {
        $this->idDireccion = $idDireccion;
    
        return $this;
    }

    /**
     * Get idEstadoColegio
     *
     * @return string 
     */
    public function getIdEstadoColegio()
    {
        return $this->idEstadoColegio;
    }
    
    /**
     * Set idEstadoColegio
     *
     * @param string $idEstadoColegio
     * @return Colegio
     */
    public function setIdEstadoColegio(\Colegio\AdminBundle\Entity\EstadoColegio $idEstadoColegio)
    {
        $this->idEstadoColegio = $idEstadoColegio;
    
        return $this;
    }
    /**
     * Set idTipoColegio
     *
     * @param string $idTipoColegio
     * @return Colegio
     */
    public function setIdTipoColegio(\Colegio\AdminBundle\Entity\TipoColegio $idTipoColegio)
    {
        $this->idTipoColegio = $idTipoColegio;
    
        return $this;
    }

    /**
     * Get idTipoColegio
     *
     * @return string 
     */
    public function getIdTipoColegio()
    {
        return $this->idTipoColegio;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Colegio
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
     * Set email
     *
     * @param string $email
     * @return Colegio
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
     * Set telefono
     *
     * @param string $telefono
     * @return Colegio
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
    
    public function __toString()
    {
        return $this->getNombre();
    }
}
