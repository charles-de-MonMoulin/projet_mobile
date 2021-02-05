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
    protected int $id;

    /**
     * @ORM\Column(type="string", length=180)
     */
    public string $city;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    public ?string $street;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    public ?string $location;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    public ?string $longitude;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    public ?string $latitude;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="address")
     */
    public ?PersistentCollection $users = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
