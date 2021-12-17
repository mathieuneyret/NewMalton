<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use App\Repository\EnigmeResolueRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Filter\FilterLogic;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"enigme_resolue:read"}},
 *     denormalizationContext={"groups"={"enigme_resolue:write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "user": "exact",
 *     "enigme": "exact",
 * })
 * @ApiFilter(FilterLogic::class)
 * @ORM\Entity(repositoryClass=EnigmeResolueRepository::class)
 */
class EnigmeResolue
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"enigme_resolue:read", "enigme_resolue:write"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Enigme::class, inversedBy="enigmeResolues")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme_resolue:read", "enigme_resolue:write"})
     */
    private $enigme;

    /**
     * @ORM\ManyToOne(targetEntity=Users::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme_resolue:read", "enigme_resolue:write"})
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
