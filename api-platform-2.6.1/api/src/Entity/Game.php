<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\PersistentCollection;

/**
 * Class Game
 * @package App\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="`game`")
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", length=180, unique= true)
     */
    public string $name;

    /**
     * @ORM\Column(type="string", length=180)
     */
    public string $description = "";

    /**
     * @var PersistentCollection
     * @OneToMany(targetEntity="Format", mappedBy="game")
     */
    public PersistentCollection $formats;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
