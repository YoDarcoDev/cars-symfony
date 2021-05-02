<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * Récupère une véhicule en fonction des on id
     * @Route("/car/{id}", name="car_show")
     */
    public function show($id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        return $this->render('car/show.html.twig', [
           'car' => $car
        ]);
    }



    /**
     * Récupère tous les véhicules
     * @Route("/cars", name="cars_showAll")
     */
    public function showAll(CarRepository $carRepository)
    {
        $cars = $carRepository->findAll();

        return $this->render('car/index.html.twig', [
            'cars' => $cars
        ]);
    }
}
