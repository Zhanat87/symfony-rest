<?php

namespace AppBundle\Form\Model;

use AppBundle\Entity\Programmer;
use AppBundle\Entity\Project;
use Symfony\Component\Validator\Constraints as Assert;

class BattleModel
{
    /**
     * @Assert\NotBlank()
     */
    private $project;

    /**
     * @Assert\NotBlank()
     */
    private $programmer;

    public function getProject()
    {
        return $this->project;
    }

    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    public function getProgrammer()
    {
        return $this->programmer;
    }

    public function setProgrammer(Programmer $programmer)
    {
        $this->programmer = $programmer;
    }
}