<?php
// src/AppBundle/Entity/User.php

namespace test\GaddourBundle\Entity;


use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity(repositoryClass="test\GaddourBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string")
     *
     *
     * @Assert\File(mimeTypes={ "image/png","image/jpg","image/jpeg" })
     */
    private $brochure;

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function setBrochure($brochure)
    {
        $this->brochure = $brochure;

        return $this;
    }






    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}