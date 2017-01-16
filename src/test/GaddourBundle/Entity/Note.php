<?php

namespace test\GaddourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\NoteRepository")
 */
class Note
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
     * @ORM\Column(name="idEtudiant", type="integer")
     */
    private $idEtudiant;

    /**
     * @var int
     *
     * @ORM\Column(name="idQuiz", type="integer")
     */
    private $idQuiz;

    /**
     * @var int
     *
     * @ORM\Column(name="contenuNote", type="integer")
     */
    private $contenuNote;


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
     * Set idEtudiant
     *
     * @param integer $idEtudiant
     *
     * @return Note
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
     * Set idQuiz
     *
     * @param integer $idQuiz
     *
     * @return Note
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

    /**
     * Set contenuNote
     *
     * @param integer $contenuNote
     *
     * @return Note
     */
    public function setContenuNote($contenuNote)
    {
        $this->contenuNote = $contenuNote;

        return $this;
    }

    /**
     * Get contenuNote
     *
     * @return int
     */
    public function getContenuNote()
    {
        return $this->contenuNote;
    }
}

