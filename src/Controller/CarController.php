<?php

namespace App\Controller;

use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    /**
     * Récupère un véhicule en fonction de son id
     * @Route("/cars/{id}", name="car_show")
     */
    public function car($id, CarRepository $carRepository): Response
    {
        $car = $carRepository->find($id);

        return $this->render('car/show.html.twig', [
           'car' => $car
        ]);
    }



    /**
     * Permet d'afficher tous les véhicules
     * @Route("/cars", name="cars_showAll")
     */
    public function cars(CarRepository $carRepository): Response
    {
        $cars = $carRepository->findAll();

        return $this->render('car/index.html.twig', [
            'cars' => $cars
        ]);
    }


    /**
     * Route qui permet de supprimer un véhicule
     * @Route("/cars/{carId}/delete", name="cars_delete")
     * @param int $carId
     * @param CarRepository $carRepository
     */
    public function deleteCar(int $carId, CarRepository $carRepository, EntityManagerInterface $em): JsonResponse
    {
        $car = $carRepository->find("$carId");

        if (!empty($car)) {

            $em->remove($car);
            $em->flush();

            $this->addFlash("success", "Le véhicule a bien été supprimé");

            return new JsonResponse([
                "success" => true,
                'carId' => $carId,
                "message" => "Le véhicule a bien été supprimé"
            ]);

        }

        $this->addFlash("danger", "Le véhicule n'a pas été supprimé");

        return new JsonResponse([
            "success" => false,
            'carId' => $carId,
            "message" => "Le véhicule n'a pas été supprimé"
        ]);
    }

}
