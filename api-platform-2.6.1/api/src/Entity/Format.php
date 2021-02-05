<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\PersistentCollection;

/**
 * Class Format
 * @package App\Entity
 *
 * @ORM\Entity()
 * @ORM\Table(name="`format`")
 */
class Format
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    public string $name;

    /**
     * @ORM\Column(type="string", length=180)
     */
    public string $description = "";

    /**
     * @var PersistentCollection
     *
     * @ManyToMany(targetEntity="User", mappedBy="formats")
     */
    public PersistentCollection $users;

    /**
     * @var Game
     * @ManyToOne(targetEntity="Game", inversedBy="formats")
     * @JoinColumn(name="game_id", referencedColumnName="id")
     */
    public Game $game;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
