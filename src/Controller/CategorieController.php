<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categories", name="categories_index")
     */
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();

        return $this->render('categorie/index.html.twig', [
            'categories' => $categories
        ]);
    }


    /**
     * Permet de sélectionner les véhicules en fonction de leur catégorie
     * @Route("/categorie/{categorieId}", name="categorie_show")
     */
    public function showCategorie($categorieId, CategorieRepository $categorieRepository, CarRepository $carRepository): Response
    {

        // Récupère tous les véhicules en fonction de leur catégorie
        $cars = $carRepository->findBy(['categorie' => $categorieId]);

        return $this->render("categorie/show.html.twig", [
            'cars' => $cars
         ]);
    }
}
