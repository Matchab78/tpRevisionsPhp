<?php

namespace App\Controller;

use App\Entity\Label;
use App\Repository\LabelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LabelController extends AbstractController
{

    #[Route('/labels', name: 'listeLabel')]
    public function listeLabel(LabelRepository $labelRepository): Response
    {
        $labels = $labelRepository->findAll();
        return $this->render('label/listeLabel.html.twig', [
            'labels' => $labels,  
        ]);
    }

    #[Route('/labels/{id}', name: 'ficheLabel')]
    public function ficheLabel(int $id, LabelRepository $labelRepository): Response
    {
        $label = $labelRepository->find($id);
        if (!$label) {
            throw $this->createNotFoundException('Pas de label');
        }
        return $this->render('label/ficheLabel.html.twig', [
            'label' => $label,  
        ]);
    }
}