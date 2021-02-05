<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\PersistentCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\SerializedName;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private string $username;

    /**
     * @ORM\Column(type="json")
     */
    private array $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private string $password;

    /**
     * @ManyToOne(targetEntity="Address", inversedBy="users")
     * @JoinColumn(name="address_id", referencedColumnName="id", nullable=true)
     */
    private ?Address $address = null;

    /**
     * @OneToOne(targetEntity="MediaObject", mappedBy="user")
     */
    private ?MediaObject $picture = null;

    /**
     * Many Users have Many Users.
     * @ManyToMany(targetEntity="User", mappedBy="myFriends")
     */
    private PersistentCollection $friendsWithMe;

    /**
     * Many Users have many Users.
     * @ManyToMany(targetEntity="User", inversedBy="friendsWithMe")
     * @JoinTable(name="friends",
     *      joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="friend_user_id", referencedColumnName="id")}
     *      )
     */
    private PersistentCollection $myFriends;

    /**
     * @var PersistentCollection
     *
     * @ManyToMany(targetEntity="Format", inversedBy="users")
     * @JoinTable(name="users_formats")
     */
    private PersistentCollection $formats;

    /**
     * @var string|null
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $email;

    /**
     * @SerializedName("password")
     */
    private ?string $plainPassword = null;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return PersistentCollection
     */
    public function getFormats(): PersistentCollection
    {
        return $this->formats;
    }

    /**
     * @param PersistentCollection $formats
     * @return User
     */
    public function setFormats(PersistentCollection $formats): User
    {
        $this->formats = $formats;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlainPassword(): ?string
    {
        return $this->plainPassword;
    }

    /**
     * @param string|null $plainPassword
     * @return User
     */
    public function setPlainPassword(?string $plainPassword): User
    {
        $this->plainPassword = $plainPassword;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Address|null
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param Address|null $address
     * @return User
     */
    public function setAddress(?Address $address): User
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return MediaObject|null
     */
    public function getPicture(): ?MediaObject
    {
        return $this->picture;
    }

    /**
     * @param MediaObject|null $picture
     * @return User
     */
    public function setPicture(?MediaObject $picture): User
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return PersistentCollection
     */
    public function getFriendsWithMe(): PersistentCollection
    {
        return $this->friendsWithMe;
    }

    /**
     * @param PersistentCollection $friendsWithMe
     * @return User
     */
    public function setFriendsWithMe(PersistentCollection $friendsWithMe): User
    {
        $this->friendsWithMe = $friendsWithMe;
        return $this;
    }

    /**
     * @return PersistentCollection
     */
    public function getMyFriends(): PersistentCollection
    {
        return $this->myFriends;
    }

    /**
     * @param PersistentCollection $myFriends
     * @return User
     */
    public function setMyFriends(PersistentCollection $myFriends): User
    {
        $this->myFriends = $myFriends;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }
}
