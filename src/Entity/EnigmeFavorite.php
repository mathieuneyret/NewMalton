<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\EnigmeFavoriteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=EnigmeFavoriteRepository::class)
 */
class EnigmeFavorite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Enigme::class, inversedBy="enigmeFavorites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enigme;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class, inversedBy="enigmeFavorites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnigme(): ?Enigme
    {
        return $this->enigme;
    }

    public function setEnigme(?Enigme $enigme): self
    {
        $this->enigme = $enigme;

        return $this;
    }

    public function getUser(): ?Users
    {
        return $this->user;
    }

    public function setUser(?Users $user): self
    {
        $this->user = $user;

        return $this;
    }
}
