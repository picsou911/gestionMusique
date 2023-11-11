<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
    #[Route('/artistes', name: 'artistes', methods: ['GET'])]
    public function listeArtistes(ArtisteRepository $repo)
    {
        $artistes=$repo->findAll();
        return $this->render('artiste/listeArtistes.html.twig', [
            'lesArtistes' => $artistes
        ]);
    }

    #[Route('/artiste/{id}', name: 'ficheArtiste', methods: ['GET'])]
    public function ficheArtiste(ArtisteRepository $artisteRepository, $id)
    {
        $artiste = $artisteRepository->find($id);
        return $this->render('artiste/ficheArtiste.html.twig', [
            'leArtiste' => $artiste
        ]);
    }
}
