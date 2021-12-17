<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"user:read"}},
 *     denormalizationContext={"groups"={"user:write"}},
 *     collectionOperations={
 *          "get",
 *          "post",
 *     },
 *     itemOperations={
 *          "get",
 *          "put",
 *          "patch",
 *          "delete",
 *     }
 * )
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Users implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"user:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"user:read", "user:write"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"user:read"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     * @Groups({"user:read", "user:write"})
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", options={"default":false})
     */
    private $isVerified = false;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"user:read", "user:write"})
     */
    private $username;

    /**
     * @ORM\Column(type="text", nullable="true")
     * @Groups({"user:read", "user:write"})
     */
    private $description;

    /**
     * @ORM\Column(type="integer", options={"default":0}, nullable="true")
     * @Groups({"user:read", "user:write"})
     */
    private $nb_picarats;

    /**
     * @ORM\OneToMany(targetEntity=Note::class, mappedBy="joueur")
     */
    private $notes;

    /**
     * @ORM\OneToMany(targetEntity=Demande::class, mappedBy="user")
     */
    private $demandes;

    /**
     * @ORM\OneToMany(targetEntity=EnigmeResolue::class, mappedBy="user")
     */
    private $enigmeResolues;

    /**
     * @ORM\OneToMany(targetEntity=EnigmeFavorite::class, mappedBy="user")
     */
    private $enigmeFavorites;

    public function __construct()
    {
        $this->notes = new ArrayCollection();
        $this->demandes = new ArrayCollection();
        $this->enigmeResolues = new ArrayCollection();
        $this->enigmeFavorites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        return array_unique($this->roles);
    }

    public function setRoles(array $roles): self
    {        
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getNbPicarats(): ?int
    {
        return $this->nb_picarats;
    }

    public function setNbPicarats(int $nb_picarats): self
    {
        $this->nb_picarats = $nb_picarats;

        return $this;
    }

    /**
     * @return Collection|Note[]
     */
    public function getNotes(): Collection
    {
        return $this->notes;
    }

    public function addNote(Note $note): self
    {
        if (!$this->notes->contains($note)) {
            $this->notes[] = $note;
            $note->setJoueur($this);
        }

        return $this;
    }

    public function removeNote(Note $note): self
    {
        if ($this->notes->removeElement($note)) {
            // set the owning side to null (unless already changed)
            if ($note->getJoueur() === $this) {
                $note->setJoueur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Demande[]
     */
    public function getDemandes(): Collection
    {
        return $this->demandes;
    }

    public function addDemande(Demande $demande): self
    {
        if (!$this->demandes->contains($demande)) {
            $this->demandes[] = $demande;
            $demande->setUser($this);
        }

        return $this;
    }

    public function removeDemande(Demande $demande): self
    {
        if ($this->demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getUser() === $this) {
                $demande->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EnigmeResolue[]
     */
    public function getEnigmeResolues(): Collection
    {
        return $this->enigmeResolues;
    }

    public function addEnigmeResolue(EnigmeResolue $enigmeResolue): self
    {
        if (!$this->enigmeResolues->contains($enigmeResolue)) {
            $this->enigmeResolues[] = $enigmeResolue;
            $enigmeResolue->setUser($this);
        }

        return $this;
    }

    public function removeEnigmeResolue(EnigmeResolue $enigmeResolue): self
    {
        if ($this->enigmeResolues->removeElement($enigmeResolue)) {
            // set the owning side to null (unless already changed)
            if ($enigmeResolue->getUser() === $this) {
                $enigmeResolue->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EnigmeFavorite[]
     */
    public function getEnigmeFavorites(): Collection
    {
        return $this->enigmeFavorites;
    }

    public function addEnigmeFavorite(EnigmeFavorite $enigmeFavorite): self
    {
        if (!$this->enigmeFavorites->contains($enigmeFavorite)) {
            $this->enigmeFavorites[] = $enigmeFavorite;
            $enigmeFavorite->setUser($this);
        }

        return $this;
    }

    public function removeEnigmeFavorite(EnigmeFavorite $enigmeFavorite): self
    {
        if ($this->enigmeFavorites->removeElement($enigmeFavorite)) {
            // set the owning side to null (unless already changed)
            if ($enigmeFavorite->getUser() === $this) {
                $enigmeFavorite->setUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getEmail();
    }
}
