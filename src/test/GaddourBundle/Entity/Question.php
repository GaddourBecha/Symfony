<?php

namespace test\GaddourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="contenuQuestion", type="string", length=255)
     */
    private $contenuQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="typeQuestion", type="integer")
     */
    private $typeQuestion;

    /**
     * @var int
     *
     * @ORM\Column(name="idQuiz", type="integer")
     */
    private $idQuiz;


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
     * Set contenuQuestion
     *
     * @param string $contenuQuestion
     *
     * @return Question
     */
    public function setContenuQuestion($contenuQuestion)
    {
        $this->contenuQuestion = $contenuQuestion;

        return $this;
    }

    /**
     * Get contenuQuestion
     *
     * @return string
     */
    public function getContenuQuestion()
    {
        return $this->contenuQuestion;
    }

    /**
     * Set typeQuestion
     *
     * @param integer $typeQuestion
     *
     * @return Question
     */
    public function setTypeQuestion($typeQuestion)
    {
        $this->typeQuestion = $typeQuestion;

        return $this;
    }

    /**
     * Get typeQuestion
     *
     * @return int
     */
    public function getTypeQuestion()
    {
        return $this->typeQuestion;
    }

    /**
     * Set idQuiz
     *
     * @param integer $idQuiz
     *
     * @return Question
     */
    public function setIdQuiz($idQuiz)
    {
        $this->idQuiz = $idQuiz;

        return $this;
    }

    /**
     * Get idQuiz
     *
     * @return int
     */
    public function getIdQuiz()
    {
        return $this->idQuiz;
    }
}

