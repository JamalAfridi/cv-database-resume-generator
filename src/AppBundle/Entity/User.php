<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    private $country;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * One User has Many Interests.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Interest", mappedBy="user")
     */
    private $interests;

    /**
     * One User has Many Skills.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Skill", mappedBy="user")
     */
    private $skills;

    /**
     * One User has Many Qualifications.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Qualification", mappedBy="user")
     */
    private $qualifications;

    /**
     * One User has Many WorkHistory.
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\WorkHistory", mappedBy="user")
     */
    private $workhistory;

    /**
     * User constructor.
     */
    public function __construct() {
        parent::__construct();
        $this->workhistory = new ArrayCollection();
        $this->interests = new ArrayCollection();
        $this->qualifications = new ArrayCollection();
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

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
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
     * @return User
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
     * Set phone
     *
     * @param string $phone
     *
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * Add qualification
     *
     * @param \AppBundle\Entity\Qualification $qualification
     *
     * @return User
     */
    public function addQualification(\AppBundle\Entity\Qualification $qualification)
    {
        $this->qualifications[] = $qualification;

        return $this;
    }

    /**
     * Remove qualification
     *
     * @param \AppBundle\Entity\Qualification $qualification
     */
    public function removeQualification(\AppBundle\Entity\Qualification $qualification)
    {
        $this->qualifications->removeElement($qualification);
    }

    /**
     * Get qualifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQualifications()
    {
        return $this->qualifications;
    }

    /**
     * Add interest
     *
     * @param \AppBundle\Entity\Interest $interest
     *
     * @return User
     */
    public function addInterest(\AppBundle\Entity\Interest $interest)
    {
        $this->interests[] = $interest;

        return $this;
    }

    /**
     * Remove interest
     *
     * @param \AppBundle\Entity\Interest $interest
     */
    public function removeInterest(\AppBundle\Entity\Interest $interest)
    {
        $this->interests->removeElement($interest);
    }

    /**
     * Get interests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterests()
    {
        return $this->interests;
    }


    /**
     * Add skill
     *
     * @param \AppBundle\Entity\Skill $skill
     *
     * @return User
     */
    public function addSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skills[] = $skill;

        return $this;
    }

    /**
     * Remove skill
     *
     * @param \AppBundle\Entity\Skill $skill
     */
    public function removeSkill(\AppBundle\Entity\Skill $skill)
    {
        $this->skills->removeElement($skill);
    }

    /**
     * Get skills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Add workhistory
     *
     * @param \AppBundle\Entity\WorkHistory $workhistory
     *
     * @return User
     */
    public function addWorkhistory(\AppBundle\Entity\WorkHistory $workhistory)
    {
        $this->workhistory[] = $workhistory;

        return $this;
    }

    /**
     * Remove workhistory
     *
     * @param \AppBundle\Entity\WorkHistory $workhistory
     */
    public function removeWorkhistory(\AppBundle\Entity\WorkHistory $workhistory)
    {
        $this->workhistory->removeElement($workhistory);
    }

    /**
     * Get workhistory
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWorkhistory()
    {
        return $this->workhistory;
    }


}
