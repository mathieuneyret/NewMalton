<?php

namespace App\Controller;

use App\Repository\EnigmeRepository;
use App\Service\EnigmeVerificationReponses;
use Doctrine\ORM\EntityNotFoundException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EnigmeVerificationReponsesController extends AbstractController
{
    /**
     * @var EnigmeRepository
     */
    private $enigmeRepository;

    /**
     * @var EnigmeVerificationReponses
     */
    private $enigmeVerificationReponses;

    public function __construct(
        EnigmeRepository $enigmeRepository,
        EnigmeVerificationReponses $enigmeVerificationReponses
    )
    {
        $this->enigmeRepository = $enigmeRepository;
        $this->enigmeVerificationReponses = $enigmeVerificationReponses;
    }

    public function __invoke(string $idEnigme, string $typeSolution, string $answer)
    {
        $enigme = $this->enigmeRepository->find($idEnigme);

        if (null == $enigme) {
            throw new EntityNotFoundException("Enigme non trouvée");
        }

        switch ($typeSolution) {
            case 'unique':
                return $this->enigmeVerificationReponses->getVerificationSolutionUniqueEnigme($enigme, $answer);
                break;
            case 'multiple':
                return $this->enigmeVerificationReponses->getVerificationSolutionMultipleEnigme($enigme, $answer);
                break;
            case 'choix':
                return $this->enigmeVerificationReponses->getVerificationSolutionAChoixEnigme($enigme, $answer);
                break;
        }

        throw new \Exception("Type de solution non reconnu");
    }
}
