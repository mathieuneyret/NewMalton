<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\EnigmeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Controller\EnigmeVerificationReponsesController;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"enigme:read"}},
 *     denormalizationContext={"groups"={"enigme:write"}},
 *     itemOperations={
 *          "get",
 *          "post",
 *          "put",
 *          "patch",
 *          "delete",
 *          "valider_reponses_enigmes"={
 *              "method"="GET",
 *              "path"="/check_reponses_enigmes/{idEnigme}/{typeSolution}/{answer}",
 *              "controller"=EnigmeVerificationReponsesController::class,
 *              "deserialize"=false,
 *              "read"=false,
 *          }
 *     }
 * )
 * @ApiFilter(SearchFilter::class, properties={
 *     "difficulty": "exact",
 *     "category": "exact",
 *     "type_enigme": "exact",
 * })
 * @ORM\Entity(repositoryClass=EnigmeRepository::class)
 */
class Enigme
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"enigme:read", "enigme_favorite:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"enigme:read", "enigme:write", "enigme_favorite:read"})
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Groups({"enigme:read", "enigme:write", "enigme_favorite:read"})
     */
    private $statement;

    /**
     * @ORM\Column(type="text")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $indice1;

    /**
     * @ORM\Column(type="text")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $indice2;

    /**
     * @ORM\Column(type="text")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $indice3;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"enigme:read", "enigme:write", "enigme_favorite:read"})
     */
    private $image_url;

    /**
     * @ORM\Column(type="text", options={"default":"Mauvaise réponse!\r\rRegardez plus attentivement."  })
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $message_response_is_incorrect;

    /**
     * @ORM\ManyToOne(targetEntity=TypeEnigme::class, inversedBy="enigmes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $type_enigme;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="enigmes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity=SolutionMultiple::class, mappedBy="enigme")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $solutionMultiples;

    /**
     * @ORM\OneToMany(targetEntity=SolutionUnique::class, mappedBy="enigme")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $solutionUniques;

    /**
     * @ORM\OneToMany(targetEntity=SolutionAChoix::class, mappedBy="enigme")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $solutionAChoixes;


    /**
     * @ORM\ManyToOne(targetEntity=Difficulte::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"enigme:read", "enigme:write", "enigme_favorite:read"})
     */
    private $difficulty;

    /**
     * @ORM\Column(type="string", length=3)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $number_picarats;

    /**
     * @ORM\Column(type="text")
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $message_response_is_correct;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"enigme:read", "enigme:write"})
     */
    private $image_response_is_correct;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"enigme:read", "enigme:write", "enigme_favorite:read"})
     */
    private $brief_description;

    public function __construct()
    {
        $this->solutionMultiples = new ArrayCollection();
        $this->solutionUniques = new ArrayCollection();
        $this->solutionAChoixes = new ArrayCollection();
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

    public function getStatement(): ?string
    {
        return $this->statement;
    }

    public function setStatement(string $statement): self
    {
        $this->statement = $statement;

        return $this;
    }

    public function getIndice1(): ?string
    {
        return $this->indice1;
    }

    public function setIndice1(string $indice1): self
    {
        $this->indice1 = $indice1;

        return $this;
    }

    public function getIndice2(): ?string
    {
        return $this->indice2;
    }

    public function setIndice2(string $indice2): self
    {
        $this->indice2 = $indice2;

        return $this;
    }

    public function getIndice3(): ?string
    {
        return $this->indice3;
    }

    public function setIndice3(string $indice3): self
    {
        $this->indice3 = $indice3;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->image_url;
    }

    public function setImageUrl(string $image_url): self
    {
        $this->image_url = $image_url;

        return $this;
    }

    public function getMessageResponseIsIncorrect(): ?string
    {
        return $this->message_response_is_incorrect;
    }

    public function setMessageResponseIsIncorrect(string $message_response_is_incorrect): self
    {
        $this->message_response_is_incorrect = $message_response_is_incorrect;

        return $this;
    }

    public function getTypeEnigme(): ?TypeEnigme
    {
        return $this->type_enigme;
    }

    public function setTypeEnigme(?TypeEnigme $type_enigme): self
    {
        $this->type_enigme = $type_enigme;

        return $this;
    }

    public function getCategory(): ?Categorie
    {
        return $this->category;
    }

    public function setCategory(?Categorie $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|SolutionMultiple[]
     */
    public function getSolutionMultiples(): Collection
    {
        return $this->solutionMultiples;
    }

    public function addSolutionMultiple(SolutionMultiple $solutionMultiple): self
    {
        if (!$this->solutionMultiples->contains($solutionMultiple)) {
            $this->solutionMultiples[] = $solutionMultiple;
            $solutionMultiple->setEnigme($this);
        }

        return $this;
    }

    public function removeSolutionMultiple(SolutionMultiple $solutionMultiple): self
    {
        if ($this->solutionMultiples->removeElement($solutionMultiple)) {
            // set the owning side to null (unless already changed)
            if ($solutionMultiple->getEnigme() === $this) {
                $solutionMultiple->setEnigme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SolutionUnique[]
     */
    public function getSolutionUniques(): Collection
    {
        return $this->solutionUniques;
    }

    public function addSolutionUnique(SolutionUnique $solutionUnique): self
    {
        if (!$this->solutionUniques->contains($solutionUnique)) {
            $this->solutionUniques[] = $solutionUnique;
            $solutionUnique->setEnigme($this);
        }

        return $this;
    }

    public function removeSolutionUnique(SolutionUnique $solutionUnique): self
    {
        if ($this->solutionUniques->removeElement($solutionUnique)) {
            // set the owning side to null (unless already changed)
            if ($solutionUnique->getEnigme() === $this) {
                $solutionUnique->setEnigme(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SolutionAChoix[]
     */
    public function getSolutionAChoixes(): Collection
    {
        return $this->solutionAChoixes;
    }

    public function addSolutionAChoix(SolutionAChoix $solutionAChoix): self
    {
        if (!$this->solutionAChoixes->contains($solutionAChoix)) {
            $this->solutionAChoixes[] = $solutionAChoix;
            $solutionAChoix->setEnigme($this);
        }

        return $this;
    }

    public function removeSolutionAChoix(SolutionAChoix $solutionAChoix): self
    {
        if ($this->solutionAChoixes->removeElement($solutionAChoix)) {
            // set the owning side to null (unless already changed)
            if ($solutionAChoix->getEnigme() === $this) {
                $solutionAChoix->setEnigme(null);
            }
        }

        return $this;
    }

    public function getDifficulty(): ?Difficulte
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulte $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getNumberPicarats(): ?string
    {
        return $this->number_picarats;
    }

    public function setNumberPicarats(string $number_picarats): self
    {
        $this->number_picarats = $number_picarats;

        return $this;
    }

    public function getMessageResponseIsCorrect(): ?string
    {
        return $this->message_response_is_correct;
    }

    public function setMessageResponseIsCorrect(string $message_response_is_correct): self
    {
        $this->message_response_is_correct = $message_response_is_correct;

        return $this;
    }

    public function getImageResponseIsCorrect(): ?string
    {
        return $this->image_response_is_correct;
    }

    public function setImageResponseIsCorrect(string $image_response_is_correct): self
    {
        $this->image_response_is_correct = $image_response_is_correct;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getBriefDescription()
    {
        return $this->brief_description;
    }

    /**
     * @param mixed $brief_description
     */
    public function setBriefDescription($brief_description): void
    {
        $this->brief_description = $brief_description;
    }
}
