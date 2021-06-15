<?php

namespace App\Controller;

use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(CarRepository $carRepository, EntityManagerInterface $em): Response
    {
        $cars = $carRepository->findBy([],[],9);

        return $this->render('home/index.html.twig',
            ['cars' => $cars
        ]);
    }
}
