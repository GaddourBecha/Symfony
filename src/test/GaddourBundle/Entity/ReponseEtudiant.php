<?php

namespace test\GaddourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReponseEtudiant
 *
 * @ORM\Table(name="reponse_etudiant")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\ReponseEtudiantRepository")
 */
class ReponseEtudiant
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
     * @var int
     *
     * @ORM\Column(name="idReponse", type="integer")
     */
    private $idReponse;

    /**
     * @var int
     *
     * @ORM\Column(name="idEtudiant", type="integer")
     */
    private $idEtudiant;

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
     * Set idReponse
     *
     * @param integer $idReponse
     *
     * @return ReponseEtudiant
     */
    public function setIdReponse($idReponse)
    {
        $this->idReponse = $idReponse;

        return $this;
    }

    /**
     * Get idReponse
     *
     * @return int
     */
    public function getIdReponse()
    {
        return $this->idReponse;
    }

    /**
     * Set idEtudiant
     *
     * @param integer $idEtudiant
     *
     * @return ReponseEtudiant
     */
    public function setIdEtudiant($idEtudiant)
    {
        $this->idEtudiant = $idEtudiant;

        return $this;
    }

    /**
     * Get idEtudiant
     *
     * @return int
     */
    public function getIdEtudiant()
    {
        return $this->idEtudiant;
    }

    /**
     * Set idQuestion
     *
     * @param integer $idQuestion
     *
     * @return ReponseEtudiant
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

