<?php

namespace Usuarios\UsuariosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoUsuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Usuarios\UsuariosBundle\Entity\TipoUsuarioRepository")
 */
class TipoUsuario
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
     * @ORM\Column(name="id_Usuario", type="string", length=255)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreTipoUsuario", type="string", length=255)
     */
    private $nombreTipoUsuario;


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
     * Set idUsuario
     *
     * @param string $idUsuario
     * @return TipoUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return string 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set nombreTipoUsuario
     *
     * @param string $nombreTipoUsuario
     * @return TipoUsuario
     */
    public function setNombreTipoUsuario($nombreTipoUsuario)
    {
        $this->nombreTipoUsuario = $nombreTipoUsuario;
    
        return $this;
    }

    /**
     * Get nombreTipoUsuario
     *
     * @return string 
     */
    public function getNombreTipoUsuario()
    {
        return $this->nombreTipoUsuario;
    }
    
    public function __toString()
    {
        return $this->getNombreTipoUsuario();
    }
}
