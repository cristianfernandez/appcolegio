<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Direccion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\DireccionRepository")
 */
class Direccion
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
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Departamento")
     */
    private $idDepartamento;
    
        /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Sede")
     */
    private $idSede;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Municipio")
     */
    private $idMunicipio;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Localidad")
     */
    private $idLocalidad;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Estrato")
     */
    private $idEstrato;

    /**
     * @var string
     *
     * @ORM\Column(name="direccionCompleta", type="string", length=255)
     */
    private $direccionCompleta;


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
     * Set idDepartamento
     *
     * @param string $idDepartamento
     * @return Direccion
     */
    public function setIdDepartamento(\Colegio\AdminBundle\Entity\Departamento $idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;
    
        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return string 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }
    
    /**
     * Set idSede
     *
     * @param string $idSede
     * @return Direccion
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
     * Set idMunicipio
     *
     * @param string $idMunicipio
     * @return Direccion
     */
    public function setIdMunicipio(\Colegio\AdminBundle\Entity\Municipio $idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;
    
        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return string 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * Set idLocalidad
     *
     * @param string $idLocalidad
     * @return Direccion
     */
    public function setIdLocalidad(\Colegio\AdminBundle\Entity\Localidad $idLocalidad)
    {
        $this->idLocalidad = $idLocalidad;
    
        return $this;
    }

    /**
     * Get idLocalidad
     *
     * @return string 
     */
    public function getIdLocalidad()
    {
        return $this->idLocalidad;
    }

    /**
     * Set idEstrato
     *
     * @param string $idEstrato
     * @return Direccion
     */
    public function setIdEstrato(\Colegio\AdminBundle\Entity\Estrato $idEstrato)
    {
        $this->idEstrato = $idEstrato;
    
        return $this;
    }

    /**
     * Get idEstrato
     *
     * @return string 
     */
    public function getIdEstrato()
    {
        return $this->idEstrato;
    }

    /**
     * Set direccionCompleta
     *
     * @param string $direccionCompleta
     * @return Direccion
     */
    public function setDireccionCompleta($direccionCompleta)
    {
        $this->direccionCompleta = $direccionCompleta;
    
        return $this;
    }

    /**
     * Get direccionCompleta
     *
     * @return string 
     */
    public function getDireccionCompleta()
    {
        return $this->direccionCompleta;
    }
    
    public function __toString()
    {
        return $this->getDireccionCompleta();
    }
}
