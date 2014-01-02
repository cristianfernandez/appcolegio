<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoColegio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Colegio\AdminBundle\Entity\TipoColegioRepository")
 */
class TipoColegio
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
     * @ORM\Column(name="tipoColegio", type="string", length=255)
     */
    private $tipoColegio;


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
     * Set tipoColegio
     *
     * @param string $tipoColegio
     * @return TipoColegio
     */
    public function setTipoColegio($tipoColegio)
    {
        $this->tipoColegio = $tipoColegio;
    
        return $this;
    }

    /**
     * Get tipoColegio
     *
     * @return string 
     */
    public function getTipoColegio()
    {
        return $this->tipoColegio;
    }
}
