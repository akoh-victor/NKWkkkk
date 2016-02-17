<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionsRepository")
 */

class Questions
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
     protected $id;
    /**
     * @ORM\Column(type="text")
     */
      protected $question;
    /**
     * @ORM\Column(type="text")
     */
     protected $answer;
    /**
     * @ORM\Column(type="text")
     */
     protected $comments;
    /**
     * @ORM\Column(type="smallint", length=1)
     */
       protected $relivance;
    /**
     * @ORM\Column(type="smallint", length=1)
     */
    protected $visibility;
    /**
     * @ORM\Column(type="string", length=60)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length = 25)
     */
    protected $firstName;
    /**
     * @ORM\Column(type="string", length = 25)
     */
    protected $lastName;
    /**
     * @ORM\Column(type="date")
     */
    protected $askDate;


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
     * Set question
     *
     * @param string $question
     *
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answer
     *
     * @param string $answer
     *
     * @return Questions
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set comments
     *
     * @param string $comments
     *
     * @return Questions
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set relivance
     *
     * @param integer $relivance
     *
     * @return Questions
     */
    public function setRelivance($relivance)
    {
        $this->relivance = $relivance;

        return $this;
    }

    /**
     * Get relivance
     *
     * @return integer
     */
    public function getRelivance()
    {
        return $this->relivance;
    }

    /**
     * Set visibility
     *
     * @param integer $visibility
     *
     * @return Questions
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get visibility
     *
     * @return integer
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Questions
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Questions
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return Questions
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set askDate
     *
     * @param \DateTime $askDate
     *
     * @return Questions
     */
    public function setAskDate($askDate)
    {
        $this->askDate = $askDate;

        return $this;
    }

    /**
     * Get askDate
     *
     * @return \DateTime
     */
    public function getAskDate()
    {
        return $this->askDate;
    }
}
