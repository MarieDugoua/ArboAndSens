<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Image;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $categoryP = new Category();
        $categoryP->setTitle("petit");
        $manager->persist($categoryP);

        $categoryG = new Category();
        $categoryG->setTitle("grand");
        $manager->persist($categoryG);

        for ($i = 1; $i <= 50; $i++) {

            $product = new Product();
            $product->setCategory($faker->randomElement($array = array($categoryP, $categoryG)))
                    ->setName($faker->randomElement($array = array("chaise", "table", "tabouret", "banc", "table de chevet", "dressing", "bibliothèque", "bureau", "étagère")))
                    ->setDescription($faker->sentence($nbWords = 150, $variableNbWords = true))
                    ->setPrice($faker->randomFloat($nbMaxDecimals = NULL, $min = 50, $max = NULL));

            $image = new Image();
            $image->setProduct($product)
                  ->setName($faker->imageUrl($width=300, $height=300, 'cats'));

            $manager->persist($product);
        }


        $manager->flush();
    }
}
