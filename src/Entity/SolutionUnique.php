<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\SolutionUniqueRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=SolutionUniqueRepository::class)
 */
class SolutionUnique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity=Enigme::class, inversedBy="solutionUniques")
     * @ORM\JoinColumn(nullable=false)
     */
    private $enigme;

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
}
