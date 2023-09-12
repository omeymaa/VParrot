<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    #[Route('/carosserie', name: 'services_carosserie')]
    public function carosserie(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'title' => 'Carosserie - Garage V.Parrot'
        ]);
    }

    #[Route('/entretien-revision', name: 'services_entretien_revision')]
    public function entretien_revision(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'title' => 'Entretien & Révision - Garage V.Parrot'
        ]);
    }

    #[Route('/mecanique', name: 'services_mecanique')]
    public function mecanique(): Response
    {
        return $this->render('services/index.html.twig', [
            'controller_name' => 'ServicesController',
            'title' => 'Mécanique - Garage V.Parrot'
        ]);
    }
}
