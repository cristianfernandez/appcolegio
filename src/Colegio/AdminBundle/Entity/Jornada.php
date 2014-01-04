<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Jornada
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Jornada
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
     * @ORM\Column(name="jornada", type="string", length=255)
     */
    private $jornada;

    /**
     * @var string
     *
     * @ORM\Column(name="Horario", type="string", length=255)
     */
    private $horario;


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
     * Set jornada
     *
     * @param string $jornada
     * @return Jornada
     */
    public function setJornada($jornada)
    {
        $this->jornada = $jornada;
    
        return $this;
    }

    /**
     * Get jornada
     *
     * @return string 
     */
    public function getJornada()
    {
        return $this->jornada;
    }

    /**
     * Set horario
     *
     * @param string $horario
     * @return Jornada
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    
        return $this;
    }

    /**
     * Get horario
     *
     * @return string 
     */
    public function getHorario()
    {
        return $this->horario;
    }
    
    public function __toString()
    {
        return $this->getJornada();
    }
}
