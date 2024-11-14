<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\LieuRepository;

class LieuController extends AbstractController
{
    #[Route('/lieu/{id}', name: 'lieu_detail')]
    public function detail(int $id, LieuRepository $lieuRepository): Response
    {
        $lieu = $lieuRepository->find($id);
        if (!$lieu) {
            throw $this->createNotFoundException('Lieu introuvable');
        }

        return $this->render('lieu/detail.html.twig', [
            'lieu' => $lieu,
        ]);
    }
}
