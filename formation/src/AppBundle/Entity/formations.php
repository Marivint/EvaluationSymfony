<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * formations
 *
 * @ORM\Table(name="formations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\formationsRepository")
 */
class formations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="modules")
     * @ORM\JoinTable(name="formations_modules",
     *      joinColumns={@ORM\JoinColumn(name="formations_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="modules_id", referencedColumnName="id")}
     *      )
     */
    private $modules;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return formations
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add module
     *
     * @param \AppBundle\Entity\modules $module
     *
     * @return formations
     */
    public function addModule(\AppBundle\Entity\modules $module)
    {
        $this->modules[] = $module;

        return $this;
    }

    /**
     * Remove module
     *
     * @param \AppBundle\Entity\modules $module
     */
    public function removeModule(\AppBundle\Entity\modules $module)
    {
        $this->modules->removeElement($module);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModules()
    {
        return $this->modules;
    }
}
