<?php

namespace test\GaddourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\reponseRepository")
 */
class reponse
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
     * @ORM\Column(name="contenuReponse", type="string", length=255)
     */
    private $contenuReponse;

    /**
     * @var bool
     *
     * @ORM\Column(name="correct", type="boolean")
     */
    private $correct;





    /**
     * @var int
     *
     * @ORM\Column(name="idQuestion", type="integer")
     */
    private $idQuestion;


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
     * Set contenuReponse
     *
     * @param string $contenuReponse
     *
     * @return reponse
     */
    public function setContenuReponse($contenuReponse)
    {
        $this->contenuReponse = $contenuReponse;

        return $this;
    }

    /**
     * Get contenuReponse
     *
     * @return string
     */
    public function getContenuReponse()
    {
        return $this->contenuReponse;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     *
     * @return reponse
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return bool
     */
    public function getCorrect()
    {
        return $this->correct;
    }

    /**
     * Set idQuestion
     *
     * @param int $idQuestion
     *
     * @return reponse
     */
    public function setIdQuestion($idQuestion)
    {
        $this->idQuestion = $idQuestion;

        return $this;
    }

    /**
     * Get idQuestion
     *
     * @return int
     */
    public function getIdQuestion()
    {
        return $this->idQuestion;
    }
}

