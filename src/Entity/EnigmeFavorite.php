<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\EnigmeFavoriteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"enigme_favorite:read"}},
 *     denormalizationContext={"groups"={"enigme_favorite:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "user": "exact",
 * })
 * @ORM\Entity(repositoryClass=EnigmeFavoriteRepository::class)
 */
class EnigmeFavorite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"enigme_favorite:read"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Enigme::class, inversedBy="enigmeFavorites")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme_favorite:read", "enigme_favorite:write"})
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
