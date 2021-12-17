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
            $enigme = $this->enigmeRepository->getMessageAndImageResponseCorrect($enigme->getId());
            return $enigme;
        }
        
        return $this->enigmeRepository->getMessageResponseIsIncorrect($enigme->getId());
    }

    public function getVerificationSolutionAChoixEnigme(Enigme $enigme, string $answer)
    {
        $solutionAChoix = $this->solutionAChoixRepository->findOneBy([
            'enigme' => $enigme,
            'value' => $answer,
            'is_valid' => true,
        ]);

        if ($solutionAChoix instanceof SolutionAChoix) {
            $enigme = $this->enigmeRepository->getMessageAndImageResponseCorrect($enigme->getId());
            return $enigme;
        }

        return $this->enigmeRepository->getMessageResponseIsIncorrect($enigme->getId());
    }

    public function getVerificationSolutionMultipleEnigme(Enigme $enigme, string $jsonAnswers)
    {
        $answers = json_decode($jsonAnswers);
        
        foreach  ($answers as $position => $answer) {
            $solutionMultiple = $this->solutionMultipleRepository->findOneBy([
                'enigme' => $enigme,
                'value' => $answer,
                'position' => $position,
            ]);

            if (!$solutionMultiple instanceof SolutionMultiple) {
                return $this->enigmeRepository->getMessageResponseIsIncorrect($enigme->getId());
            }
        }

        $enigme = $this->enigmeRepository->getMessageAndImageResponseCorrect($enigme->getId());
        return $enigme;
    }
}