<?php

namespace Colegio\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estrato
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Estrato
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
     * @ORM\Column(name="estrato", type="string", length=255)
     */
    private $estrato;


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
     * Set estrato
     *
     * @param string $estrato
     * @return Estrato
     */
    public function setEstrato($estrato)
    {
        $this->estrato = $estrato;
    
        return $this;
    }

    /**
     * Get estrato
     *
     * @return string 
     */
    public function getEstrato()
    {
        return $this->estrato;
    }
    
    public function __toString()
    {
        return $this->getEstrato();
    }
}
