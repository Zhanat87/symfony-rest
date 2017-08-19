<?php

namespace AppBundle\Entity;

use AppBundle\Annotation\Link;
use Doctrine\ORM\Mapping as ORM;

use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * @ORM\Table(name="battle_battle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BattleRepository")
 * @Serializer\ExclusionPolicy("all")
 * @Hateoas\Relation(
 *     "programmer",
 *     href=@Hateoas\Route(
 *          "api_programmers_show",
 *          parameters={"nickname"= "expr(object.getProgrammerNickname())"}
 *     ),
 *     embedded = "expr(object.getProgrammer())"
 * )
 */
class Battle
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Programmer")
     * @ORM\JoinColumn(nullable=false)
     * @Serializer\Expose()
     */
    private $programmer;

    /**
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumn(nullable=false)
     */
    private $project;

    /**
     * @ORM\Column(type="boolean")
     * @Serializer\Expose()
     */
    private $didProgrammerWin;

    /**
     * @ORM\Column(type="datetime")
     * @Serializer\Expose()
     */
    private $foughtAt;

    /**
     * @ORM\Column(type="text")
     * @Serializer\Expose()
     */
    private $notes;

    /**
     * Battle constructor.
     * @param $programmer
     * @param $project
     */
    public function __construct(Programmer $programmer, Project $project)
    {
        $this->programmer = $programmer;
        $this->project = $project;
        $this->foughtAt = new \DateTime();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setBattleWonByProgrammer($notes)
    {
        $this->didProgrammerWin = true;
        $this->notes = $notes;
    }

    public function setBattleLostByProgrammer($notes)
    {
        $this->didProgrammerWin = false;
        $this->notes = $notes;
    }

    /**
     * @return Programmer
     */
    public function getProgrammer()
    {
        return $this->programmer;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    public function getDidProgrammerWin()
    {
        return $this->didProgrammerWin;
    }

    public function getFoughtAt()
    {
        return $this->foughtAt;
    }

    public function getNotes()
    {
        return $this->notes;
    }

    public function getProgrammerNickname()
    {
        return $this->programmer->getNickname();
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\SerializedName("project")
     */
    public function getProjectId()
    {
        return $this->project->getId();
    }
}
