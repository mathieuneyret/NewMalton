<?php

namespace App\Service;

use App\Entity\SolutionAChoix;
use App\Entity\SolutionMultiple;
use App\Entity\SolutionUnique;
use App\Repository\SolutionAChoixRepository;
use App\Repository\SolutionMultipleRepository;
use App\Repository\SolutionUniqueRepository;
use App\Entity\Enigme;

class EnigmeVerificationReponses
{
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
        SolutionUniqueRepository $solutionUniqueRepository,
        SolutionAChoixRepository $solutionAChoixRepository,
        SolutionMultipleRepository $solutionMultipleRepository
    ){
        $this->solutionUniqueRepository = $solutionUniqueRepository;
        $this->solutionAChoixRepository = $solutionAChoixRepository;
        $this->solutionMultipleRepository = $solutionMultipleRepository;
    }

    public function getVerificationSolutionUniqueEnigme(Enigme $enigme, string $answer): bool
    {
        $solutionUnique = $this->solutionUniqueRepository->findOneBy([
            'enigme' => $enigme,
            'value' => $answer
        ]);

        return $solutionUnique instanceof SolutionUnique;
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

    public function getVerificationSolutionMultipleEnigme(Enigme $enigme): bool
    {
        return false;
        //to do next time
        $solutionUnique = $this->solutionMultipleRepository->findOneBy([
            'enigme' => $enigme,
        ]);

        return $solutionUnique instanceof SolutionMultiple;
    }
}