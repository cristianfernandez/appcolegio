<?php

namespace Colegio\EstudianteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\EstudianteBundle\Entity\EstudianteRepository")
 */
class Estudiante
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
     * @ORM\ManyToOne(targetEntity="Colegio\AdminBundle\Entity\Sede")
     */
    private $idSede;

    /**
     * @var string
     *
     * @ORM\Column(name="id_TipoIdentificacion", type="string", length=255)
     */
    private $idTipoIdentificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="primerNombre", type="string", length=255)
     */
    private $primerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundoNombre", type="string", length=255)
     */
    private $segundoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primerApellido", type="string", length=255)
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundoApellido", type="string", length=255)
     */
    private $segundoApellido;

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
     * @ORM\Column(name="nui", type="string", length=255)
     */
    private $nui;

    /**
     * @var string
     *
     * @ORM\Column(name="nuip", type="string", length=255)
     */
    private $nuip;

    /**
     * @var string
     *
     * @ORM\Column(name="numeroDocumento", type="string", length=255)
     */
    private $numeroDocumento;


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
     * @return Estudiante
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
     * Set idTipoIdentificacion
     *
     * @param string $idTipoIdentificacion
     * @return Estudiante
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
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return Estudiante
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    
        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string 
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return Estudiante
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    
        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return Estudiante
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    
        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string 
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return Estudiante
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    
        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return Estudiante
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
     * @return Estudiante
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
     * Set nui
     *
     * @param string $nui
     * @return Estudiante
     */
    public function setNui($nui)
    {
        $this->nui = $nui;
    
        return $this;
    }

    /**
     * Get nui
     *
     * @return string 
     */
    public function getNui()
    {
        return $this->nui;
    }

    /**
     * Set nuip
     *
     * @param string $nuip
     * @return Estudiante
     */
    public function setNuip($nuip)
    {
        $this->nuip = $nuip;
    
        return $this;
    }

    /**
     * Get nuip
     *
     * @return string 
     */
    public function getNuip()
    {
        return $this->nuip;
    }

    /**
     * Set numeroDocumento
     *
     * @param string $numeroDocumento
     * @return Estudiante
     */
    public function setNumeroDocumento($numeroDocumento)
    {
        $this->numeroDocumento = $numeroDocumento;
    
        return $this;
    }

    /**
     * Get numeroDocumento
     *
     * @return string 
     */
    public function getNumeroDocumento()
    {
        return $this->numeroDocumento;
    }
    
    //Método para Cargar un valor por defecto
    public function __toString() {
        return $this->getPrimerNombre()." ".$this->getSegundoNombre()." ".
                $this->getPrimerApellido()." ".$this->getSegundoApellido();
    }
}
