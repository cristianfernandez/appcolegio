<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Municipio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Municipio
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
     * @ORM\Column(name="nombreMunicipio", type="string", length=255)
     */
    private $nombreMunicipio;


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
     * @return Municipio
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
     * Set nombreMunicipio
     *
     * @param string $nombreMunicipio
     * @return Municipio
     */
    public function setNombreMunicipio($nombreMunicipio)
    {
        $this->nombreMunicipio = $nombreMunicipio;
    
        return $this;
    }

    /**
     * Get nombreMunicipio
     *
     * @return string 
     */
    public function getNombreMunicipio()
    {
        return $this->nombreMunicipio;
    }
    
    public function __toString()
    {
        return $this->getNombreMunicipio();
    }
}
