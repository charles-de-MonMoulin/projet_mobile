<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class MediaObject
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="`media_object`")
 */
class MediaObject
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    public ?string $filePath;

    /**
     * @ORM\Column(type="datetime", length=180, nullable=true)
     */
    public ?string $updatedAt;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    public ?string $filename;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="picture")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    public User $user;

    /**
     * @var string|null
     */
    public ?string $contentUrl;

    /**
     * @var File|null
     *
     * @Assert\NotNull(groups={"media_object_create"})
     * @Vich\UploadableField(mapping="media_object", fileNameProperty="filePath")
     */
    public ?File $file = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
