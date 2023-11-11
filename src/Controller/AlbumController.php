<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AlbumController extends AbstractController
{
    #[Route('/albums', name: 'albums', methods: ['GET'])]
    public function listeAlbums(AlbumRepository $repo)
    {
        $albums=$repo->findAll();
        return $this->render('album/listeAlbums.html.twig', [
            'lesAlbums' => $albums
        ]);
    }

    //#[Route('/album/{id}', name: 'ficheAlbum', methods: ['GET'])]
    //public function ficheAlbum($id, AlbumRepository $repo): Response
    //{
    //    $album= $repo->find($id);
    //    return $this->render('album/ficheAlbum.html.twig', [
    //        'lealbum' => $album
    //    ]);
    //}
    #[Route('/album/{id}', name: 'ficheAlbum', methods: ['GET'])]
  
    public function fichealbum(AlbumRepository $albumRepository, $id)
    {
        $album = $albumRepository->find($id);
        return $this->render('album/ficheAlbum.html.twig', [
            'leAlbum' => $album
        ]);
    }
}
