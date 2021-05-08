<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\String\Slugger\SluggerInterface;


class AppFixtures extends Fixture
{

    protected $slugger;

    public function __construct(SluggerInterface $slugger){
        $this->slugger = $slugger;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        // Ajout librairie FakeCar
        $faker->addProvider(new \Faker\Provider\Fakecar($faker));

        // Ajout librairie FakePrices
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        // Ajout librairie Bluemmb Picsum
        $faker->addProvider(new \Bluemmb\Faker\PicsumPhotosProvider($faker));

        // Ajout librairie Collection
        // $faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));

        // CREATION DES FIXTURES CATEGORIES
        $categories = ["SUV","Berline","Break","Cabriolet","Coupe","Citadine","Monospace"];

        for ($i = 0; $i < 7; $i++) {

            $categorie = new Categorie();
            $categorie
                ->setType($categories[$i])
                ->setSlug(strtolower($this->slugger->slug($categorie->getType())));

            $manager->persist($categorie);


            // CREATION DES FIXTURES CARS
            for ($j = 0; $j < mt_rand(15, 20); $j++) {
                $car = new Car();

                $vehicule = $faker->vehicleArray();
                $marque = $vehicule['brand'];
                $modele = $vehicule['model'];

                $car
                    ->setMarque($marque)
                    ->setModele($modele)
                    ->setAnnee($faker->year())
                    ->setKm(mt_rand(1500, 200000))
                    ->setCarburant($faker->vehicleFuelType())
                    ->setCouleur($faker->colorName())
                    ->setPortes($faker->vehicleDoorCount())
                    ->setPuissance(mt_rand(50, 600))
                    ->setDescription($faker->sentence())
                    ->setImage($faker->imageUrl(400, 400, true))
                    ->setLieu($faker->city())
                    ->setPrice($faker->price(10000, 100000))
                    ->setCategorie($categorie); // Relier voiture à une catégorie

                $manager->persist($car);
            }
        }

        $manager->flush();
    }
}
