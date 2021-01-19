<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Image;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $allCategory = array();
        foreach (array("petit", "grand") as &$val) {
            $category = new Category();
            $category->setTitle($val);
            array_push($allCategory, $category);
            $manager->persist($category);
        }

        $allProduct = array();
        foreach (array("chaise", "table", "tabouret", "banc", "table de chevet", "dressing", "bibliothèque", "bureau", "étagère") as &$val) {
            $OneProduct = new Product();
            $OneProduct->setName($val);
            array_push($allProduct, $OneProduct);
            $manager->persist($OneProduct);
        }
dump($val);
        for ($i = 1; $i <= 50; $i++) {
            $categoryIndex = rand(0, sizeof($allCategory) - 1);
            $category = $allCategory[$categoryIndex];

            $product = new Product();
            $product->setCategory( $category)
                ->setName($OneProduct)
                ->setDescription($faker -> sentence($nbWords = 6, $variableNbWords = true))
                ->setPrice($faker -> randomFloat($nbMaxDecimals = NULL, $min = 50, $max = NULL));

            $manager->persist($product);
        }


        $manager->flush();
    }
}
