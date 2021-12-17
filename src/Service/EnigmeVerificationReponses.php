<?php

namespace App\Service;

use App\Entity\SolutionAChoix;
use App\Entity\SolutionMultiple;
use App\Entity\SolutionUnique;
use App\Repository\SolutionAChoixRepository;
use App\Repository\SolutionMultipleRepository;
use App\Repository\SolutionUniqueRepository;
use App\Entity\Enigme;
use App\Repository\EnigmeRepository;

class EnigmeVerificationReponses
{
    /**
     * @var EnigmeRepository
     */
    private $enigmeRepository;

    /**
     * @var SolutionUniqueRepository
     */
    private $solutionUniqueRepository;

    /**
     * @var SolutionAChoixRepository
     */
    private $solutionAChoixRepository;

    /**
     * @var SolutionMultipleRepository
     */
    private $solutionMultipleRepository;

    public function __construct(
        EnigmeRepository $enigmeRepository,
        SolutionUniqueRepository $solutionUniqueRepository,
        SolutionAChoixRepository $solutionAChoixRepository,
        SolutionMultipleRepository $solutionMultipleRepository
    ){
        $this->enigmeRepository = $enigmeRepository;
        $this->solutionUniqueRepository = $solutionUniqueRepository;
        $this->solutionAChoixRepository = $solutionAChoixRepository;
        $this->solutionMultipleRepository = $solutionMultipleRepository;
    }

    public function getVerificationSolutionUniqueEnigme(Enigme $enigme, string $answer)
    {
        $solutionUnique = $this->solutionUniqueRepository->findOneBy([
            'enigme' => $enigme,
            'value' => $answer
        ]);

        if ($solutionUnique instanceof SolutionUnique) {
            $enigme = $this->enigmeRepository->getSolutionUnique($enigme->getId());
            return $enigme;
        }
        
        return $this->enigmeRepository->getMessageResponseIsIncorrect($enigme->getId());
    }

    public function getVerificationSolutionAChoixEnigme(Enigme $enigme, string $answer): bool
    {
        $solutionUnique = $this->solutionAChoixRepository->findOneBy([
            'enigme' => $enigme,
            'value' => $answer,
            'is_valid' => true,
        ]);

        return $solutionUnique instanceof SolutionAChoix;
    }

    public function getVerificationSolutionMultipleEnigme(Enigme $enigme)
    {
        /*$solutionUnique = $this->solutionMultipleRepository->findOneBy([
            'enigme' => $enigme,
        ]);

        return $solutionUnique instanceof SolutionMultiple;*/
    }
}