<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\EnigmeFavoriteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Filter\FilterLogic;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"enigme_favorite:read"}},
 *     denormalizationContext={"groups"={"enigme_favorite:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "user": "exact",
 *     "enigme": "exact",
 * })
 * @ApiFilter(FilterLogic::class)
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
     * @ORM\ManyToOne(targetEntity=Enigme::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme_favorite:read", "enigme_favorite:write"})
     */
    private $enigme;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme_favorite:read", "enigme_favorite:write"})
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

    public function getUsersADelete(): ?Users
    {
        return $this->users_a_delete;
    }

    public function setUsersADelete(?Users $users_a_delete): self
    {
        $this->users_a_delete = $users_a_delete;

        return $this;
    }
}
