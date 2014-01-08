<?php

namespace Usuarios\UsuariosBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * TipoUsuario
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Usuarios\UsuariosBundle\Entity\TipoUsuarioRepository")
 */
class TipoUsuario implements RoleInterface
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
     * @ORM\ManyToMany(targetEntity="Usuarios\UsuariosBundle\Entity\TipoUsuario", mappedBy="roles")
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreTipoUsuario", type="string", length=255)
     */
    private $nombreTipoUsuario;

    /**
     * 
     * @ORM\Column(name="role", type="string", length=20, unique=true)
     */
    private $role;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }
    
     /**
     * @see RoleInterface
     */
    public function getRole()
    {
        return $this->role;
    }
    
     /**
     * Set role
     *
     * @param string $role
     * @return TipoUsuario
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }
    
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
