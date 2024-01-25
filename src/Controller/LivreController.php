<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Form\LivreFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class LivreController extends AbstractController
{
    #[Route('/livre', name: 'app_livre')]

    public function index(EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Genre::class);
        $genre = $repository->findAll();


        $repository = $entityManager->getRepository(Livre::class);

        $livre = $repository->findAll();

         //var_dump($genre);
        return $this->render('livre/index.html.twig', [
            'genre' => $genre,
            'livre' => $livre

        ]);
    }

    #[Route('/livre/{id}', name: 'show')]
    public function show(int $id,EntityManagerInterface $entityManager): Response
    {
        $livre = new Livre();
        $form = $this->createForm(LivreFormType::class,$livre);

        $repository = $entityManager->getRepository(Genre::class);
        $genre = $repository->findAll();

        $repository = $entityManager->getRepository(Livre::class);
        $livre = $repository->find($id);

        $genreNom = $livre->getGenre()->getNom();

        return $this->render('livre/show.html.twig', [

            'genreNom' => $genreNom,
            'livre' => $livre,
            'genre' => $genre,
            'form' =>  $form->createView(),


        ]);


    }



}
