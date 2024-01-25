<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Form\LivreFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class GenreController extends AbstractController
{
    #[Route('/genre', name: 'app_genre')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $genre = new Genre();
        $genre->setNom("fantastique");
        $genre->setDescription("Le fantastique est un genre littéraire que l'on peut décrire comme l’intrusion du surnaturel dans le cadre réaliste d’un récit.");

        $genre2 = new Genre();
        $genre2->setNom("science-fiction");
        $genre2->setDescription("La science-fiction est un genre littéraire caractérisé par une narration proposant des hypothèses.");

        $genre3 = new Genre();
        $genre3->setNom("cuisine");
        $genre3->setDescription("La cuisine est l'art et la manière de préparer et d'apprêter les aliments");

        $genre4 = new Genre();
        $genre4->setNom("poésie");
        $genre4->setDescription("La poésie est un genre littéraire très ancien aux formes variées");


        $entityManager->persist($genre);
        $entityManager->persist($genre2);
        $entityManager->persist($genre3);
        $entityManager->persist($genre4);

        //$entityManager->flush();

        //return new Response('ok');

        $repository = $entityManager->getRepository(Genre::class);

        $genre = $repository->findAll();

        //dd($genre);

        return $this->render('genre/index.html.twig', [

            'genre' => $genre,
        ]);
    }

    #[Route('/genre/{id}', name: 'description')]
    public function show(int $id, EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Genre::class);
        $genre = $repository->find($id);
        $livres = $genre->getLivre();
        //var_dump($genre);
        return $this->render('genre/show.html.twig', [

            'livres' => $livres,
            'genre' =>$genre,
        ]);


    }


}
