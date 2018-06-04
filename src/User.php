<?php

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity() @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id() @ORM\GeneratedValue() @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="datetime", name="birthdate")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return integer
     */
    public function getAge()
    {
        $now = new DateTime('now');
        $birtday = new DateTime($this->getBirthday()->format("Y-m-d"));

        return $now->diff($birtday)->y;
    }

    /**
     * @return boolean
     */
    public function isAdult()
    {
        switch ($this->getCountry()) {
            case 'US':
                return $this->getAge() >= 21;
                break;
            default:
                return $this->getAge() >= 18;
        }

    }

    /**
     * @return datetime
     */
    private function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return string
     */
    private function getCountry() {
        return $this->country;
    }
}