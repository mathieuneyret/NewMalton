<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\TypeEnigmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=TypeEnigmeRepository::class)
 */
class TypeEnigme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Enigme::class, mappedBy="type_enigme")
     */
    private $enigmes;

    public function __construct()
    {
        $this->enigmes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Enigme[]
     */
    public function getEnigmes(): Collection
    {
        return $this->enigmes;
    }

    public function addEnigme(Enigme $enigme): self
    {
        if (!$this->enigmes->contains($enigme)) {
            $this->enigmes[] = $enigme;
            $enigme->setTypeEnigme($this);
        }

        return $this;
    }

    public function removeEnigme(Enigme $enigme): self
    {
        if ($this->enigmes->removeElement($enigme)) {
            // set the owning side to null (unless already changed)
            if ($enigme->getTypeEnigme() === $this) {
                $enigme->setTypeEnigme(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
