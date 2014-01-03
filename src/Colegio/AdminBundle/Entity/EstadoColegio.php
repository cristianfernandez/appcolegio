<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoColegio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\EstadoColegioRepository")
 */
class EstadoColegio
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
     * @ORM\Column(name="estadoColegio", type="string", length=255)
     */
    private $estadoColegio;


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
     * Set estadoColegio
     *
     * @param string $estadoColegio
     * @return EstadoColegio
     */
    public function setEstadoColegio($estadoColegio)
    {
        $this->estadoColegio = $estadoColegio;
    
        return $this;
    }

    /**
     * Get estadoColegio
     *
     * @return string 
     */
    public function getEstadoColegio()
    {
        return $this->estadoColegio;
    }
}
