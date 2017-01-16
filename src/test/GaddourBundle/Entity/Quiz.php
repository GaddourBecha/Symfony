<?php

namespace test\GaddourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quiz
 *
 * @ORM\Table(name="quiz")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\QuizRepository")
 */
class Quiz
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
     * @ORM\Column(name="contenuQuiz", type="string", length=255)
     */
    private $contenuQuiz;

    /**
     * @var int
     *
     * @ORM\Column(name="idProf", type="integer")
     */
    private $idProf;


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
     * Set contenuQuiz
     *
     * @param string $contenuQuiz
     *
     * @return Quiz
     */
    public function setContenuQuiz($contenuQuiz)
    {
        $this->contenuQuiz = $contenuQuiz;

        return $this;
    }

    /**
     * Get contenuQuiz
     *
     * @return string
     */
    public function getContenuQuiz()
    {
        return $this->contenuQuiz;
    }

    /**
     * Set idProf
     *
     * @param integer $idProf
     *
     * @return Quiz
     */
    public function setIdProf($idProf)
    {
        $this->idProf = $idProf;

        return $this;
    }

    /**
     * Get idProf
     *
     * @return int
     */
    public function getIdProf()
    {
        return $this->idProf;
    }
}

