<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SolutionMultipleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SolutionMultipleRepository::class)
 */
class SolutionMultiple
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Enigme::class, inversedBy="solutionMultiples")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enigme;

    /**
     * @ORM\Column(type="string", length=2)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $position;

    /**
     * @ORM\Column(type="string", nullable=true, length=255)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
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

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
