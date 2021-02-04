<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    private int $id;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $filePath;

    /**
     * @ORM\Column(type="datetime", length=180, nullable=true)
     */
    private ?string $updatedAt;

    /**
     * @ORM\Column(type="string", length=180, nullable=true)
     */
    private ?string $fileName;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="picture")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private User $user;

    public ?string $contentUrl = null;

    /**
     * @var UploadedFile|null
     */
    private ?UploadedFile $file = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return MediaObject
     */
    public function setId(int $id): MediaObject
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    /**
     * @param string|null $filePath
     * @return MediaObject
     */
    public function setFilePath(?string $filePath): MediaObject
    {
        $this->filePath = $filePath;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param string|null $updatedAt
     * @return MediaObject
     */
    public function setUpdatedAt(?string $updatedAt): MediaObject
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     * @return MediaObject
     */
    public function setFileName(?string $fileName): MediaObject
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return MediaObject
     */
    public function setUser(User $user): MediaObject
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     * @return MediaObject
     */
    public function setFile(?UploadedFile $file): MediaObject
    {
        $this->file = $file;
        return $this;
    }
}
