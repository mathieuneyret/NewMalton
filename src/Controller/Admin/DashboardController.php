<?php

namespace App\Controller\Admin;

use App\Entity\Users;
use App\Entity\Categorie;
use App\Entity\Demande;
use App\Entity\Enigme;
use App\Entity\EnigmeFavorite;
use App\Entity\EnigmeResolue;
use App\Entity\Note;
use App\Entity\SolutionAChoix;
use App\Entity\SolutionMultiple;
use App\Entity\SolutionUnique;
use App\Entity\TypeEnigme;
use App\Entity\Difficulte;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class DashboardController extends AbstractDashboardController
{
    private AuthenticationUtils $authenticationUtils;

    public function __construct(
        AuthenticationUtils $authenticationUtils
    ){
        $this->authenticationUtils = $authenticationUtils;
    }

    /**
     * @Route("/")
     */
    public function index(): Response
    {
        if ($this->getUser()) {
            return parent::index();
        }
        
        return new RedirectResponse('/admin');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(): Response
    {
        if (!$this->getUser()) {
            $error = $this->authenticationUtils->getLastAuthenticationError();
            return $this->render('security/login.html.twig', [
                'error' => $error
            ]);
        }
        
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('NewMalton');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Users', 'fas fa-user', Users::class);
        yield MenuItem::linkToCrud('Enigme', 'fas fa-mask', Enigme::class);
        yield MenuItem::linkToCrud('Categorie', 'fas fa-list', Categorie::class);
        yield MenuItem::linkToCrud('Difficulté', 'fas fa-tachometer-alt', Difficulte::class);
        yield MenuItem::linkToCrud('Demande', 'fab fa-laravel', Demande::class);
        yield MenuItem::linkToCrud('Enigme Favorite', 'fas fa-heart', EnigmeFavorite::class);
        yield MenuItem::linkToCrud('Enigme Résolue', 'fas fa-check-circle', EnigmeResolue::class);
        yield MenuItem::linkToCrud('Note', 'far fa-sticky-note', Note::class);
        yield MenuItem::linkToCrud('Solution A Choix', 'fas fa-check', SolutionAChoix::class);
        yield MenuItem::linkToCrud('Solution Multiple', 'fas fa-check', SolutionMultiple::class);
        yield MenuItem::linkToCrud('Solution Unique', 'fas fa-check', SolutionUnique::class);
        yield MenuItem::linkToCrud('Type Enigme', 'fab fa-symfony', TypeEnigme::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
