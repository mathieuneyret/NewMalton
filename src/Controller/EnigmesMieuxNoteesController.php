<?php

namespace App\Controller;

use App\Repository\EnigmeRepository;
use App\Service\EnigmesNotes;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnigmesMieuxNoteesController extends AbstractController
{
    /**
     * @var EnigmeRepository
     */
    private $enigmeRepository;

    /**
     * @var EnigmesNotes
     */
    private $enigmesNotes;

    public function __construct(
        EnigmeRepository $enigmeRepository,
        EnigmesNotes $enigmesNotes
    )
    {
        $this->enigmeRepository = $enigmeRepository;
        $this->enigmesNotes = $enigmesNotes;
    }

    public function __invoke()
    {
        return $this->enigmesNotes->getEnigmesMieuxNotees();
    }
}
