<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="task", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Task_User2_idx", columns={"subsciber_id"})})
 * @ORM\Entity
 */
class Task
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subsciber_id", referencedColumnName="id")
     * })
     */
    private $subsciber;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Tag", mappedBy="task")
     */
    private $tag;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\User", inversedBy="task")
     * @ORM\JoinTable(name="subscription",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Task_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     *   }
     * )
     */
    private $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Task", inversedBy="task1")
     * @ORM\JoinTable(name="related",
     *   joinColumns={
     *     @ORM\JoinColumn(name="Task1_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="Task2_id", referencedColumnName="id")
     *   }
     * )
     */
    private $task2;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Task", inversedBy="parentTask")
     * @ORM\JoinTable(name="dependency",
     *   joinColumns={
     *     @ORM\JoinColumn(name="parent_task_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="dependent_task_id", referencedColumnName="id")
     *   }
     * )
     */
    private $dependentTask;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tag = new \Doctrine\Common\Collections\ArrayCollection();
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
        $this->task2 = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dependentTask = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Task
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Task
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
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
     * Set subsciber
     *
     * @param \AppBundle\Entity\User $subsciber
     *
     * @return Task
     */
    public function setSubsciber(\AppBundle\Entity\User $subsciber = null)
    {
        $this->subsciber = $subsciber;

        return $this;
    }

    /**
     * Get subsciber
     *
     * @return \AppBundle\Entity\User
     */
    public function getSubsciber()
    {
        return $this->subsciber;
    }

    /**
     * Add tag
     *
     * @param \AppBundle\Entity\Tag $tag
     *
     * @return Task
     */
    public function addTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \AppBundle\Entity\Tag $tag
     */
    public function removeTag(\AppBundle\Entity\Tag $tag)
    {
        $this->tag->removeElement($tag);
    }

    /**
     * Get tag
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Add user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Task
     */
    public function addUser(\AppBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \AppBundle\Entity\User $user
     */
    public function removeUser(\AppBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add task2
     *
     * @param \AppBundle\Entity\Task $task2
     *
     * @return Task
     */
    public function addTask2(\AppBundle\Entity\Task $task2)
    {
        $this->task2[] = $task2;

        return $this;
    }

    /**
     * Remove task2
     *
     * @param \AppBundle\Entity\Task $task2
     */
    public function removeTask2(\AppBundle\Entity\Task $task2)
    {
        $this->task2->removeElement($task2);
    }

    /**
     * Get task2
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTask2()
    {
        return $this->task2;
    }

    /**
     * Add dependentTask
     *
     * @param \AppBundle\Entity\Task $dependentTask
     *
     * @return Task
     */
    public function addDependentTask(\AppBundle\Entity\Task $dependentTask)
    {
        $this->dependentTask[] = $dependentTask;

        return $this;
    }

    /**
     * Remove dependentTask
     *
     * @param \AppBundle\Entity\Task $dependentTask
     */
    public function removeDependentTask(\AppBundle\Entity\Task $dependentTask)
    {
        $this->dependentTask->removeElement($dependentTask);
    }

    /**
     * Get dependentTask
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDependentTask()
    {
        return $this->dependentTask;
    }
}
