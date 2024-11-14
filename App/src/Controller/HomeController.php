<?php

namespace App\Controller;

use App\Entity\Lieu;
use App\Repository\LieuRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(EntityManagerInterface $entityManager): Response
    {

        $lieu = $entityManager->getRepository(Lieu::class)->findBy([]);


        // Mélange et limite à 10 éléments
        shuffle($lieu);
        $lieu = array_slice($lieu, 0, 10);


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'lieu' => $lieu,
        ]);
    }
}
