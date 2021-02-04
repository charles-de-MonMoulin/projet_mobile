<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\PersistentCollection;

/**
 * @ORM\Entity()
 * @ORM\Table(name="`address`")
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    private string $city;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $street;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $location;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $longitude;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $latitude;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="address")
     */
    private ?PersistentCollection $users = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Address
     */
    public function setId(int $id): Address
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Address
     */
    public function setCity(string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStreet(): ?string
    {
        return $this->street;
    }

    /**
     * @param string|null $street
     * @return Address
     */
    public function setStreet(?string $street): Address
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLocation(): ?string
    {
        return $this->location;
    }

    /**
     * @param string|null $location
     * @return Address
     */
    public function setLocation(?string $location): Address
    {
        $this->location = $location;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLongitude(): ?string
    {
        return $this->longitude;
    }

    /**
     * @param string|null $longitude
     * @return Address
     */
    public function setLongitude(?string $longitude): Address
    {
        $this->longitude = $longitude;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLatitude(): ?string
    {
        return $this->latitude;
    }

    /**
     * @param string|null $latitude
     * @return Address
     */
    public function setLatitude(?string $latitude): Address
    {
        $this->latitude = $latitude;
        return $this;
    }

    /**
     * @return PersistentCollection|null
     */
    public function getUsers(): ?PersistentCollection
    {
        return $this->users;
    }

    /**
     * @param PersistentCollection|null $users
     * @return Address
     */
    public function setUsers(?PersistentCollection $users): Address
    {
        $this->users = $users;
        return $this;
    }
}
