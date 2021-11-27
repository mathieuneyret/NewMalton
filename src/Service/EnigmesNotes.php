<?php

namespace App\Service;

use App\Entity\SolutionAChoix;
use App\Entity\SolutionMultiple;
use App\Entity\SolutionUnique;
use App\Repository\EnigmeRepository;
use App\Repository\NoteRepository;
use App\Repository\SolutionAChoixRepository;
use App\Repository\SolutionMultipleRepository;
use App\Repository\SolutionUniqueRepository;
use App\Entity\Enigme;

class EnigmesNotes
{
    /**
     * @var NoteRepository
     */
    private $noteRepository;

    /**
     * @var EnigmeRepository
     */
    private $enigmeRepository;

    public function __construct(
        NoteRepository $noteRepository,
        EnigmeRepository $enigmeRepository
    ){
        $this->noteRepository = $noteRepository;
        $this->enigmeRepository = $enigmeRepository;
    }

    public function getEnigmesMieuxNotees()
    {
        $enigmes = [];
        $order_enigmes_mieux_notees = $this->noteRepository->getEnigmesMieuxNotees();

        foreach($order_enigmes_mieux_notees as $enigme_id){
            array_push(
                $enigmes,
                $this->enigmeRepository->find($enigme_id[1])
            );
        }

        return $enigmes;
    }
}