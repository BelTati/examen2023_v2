<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Livre;
use App\Form\LivreFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LivreFormController extends AbstractController
{

    #[Route('/form', name: 'app_livre_form')]

    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {

        $repository = $entityManager->getRepository(Genre::class);
        $genre = $repository->findAll();

       // dd($livre);

        $livre = new Livre();
        $form = $this->createForm(LivreFormType::class,$livre);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()){

            $livre = $form->getData();

            $livre->setDateAjout(new \DateTime('now'));
            //dd($livre);

            $entityManager->persist($livre);
            //$entityManager->flush();


        }

        return $this->render('livre_form/index.html.twig', [
            'genre' => $genre,
            'form' =>  $form->createView()
        ]);


    }
}
