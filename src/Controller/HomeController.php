<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __Construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(1);

        return $this->render('home/index.html.twig', [
            'products' => $products,
        ]);
    }

    /**
     * @Route("/home/presentation", name="presentation")
     */
    public function presentation()
    {
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(1);

        return $this->render('home/presentation.html.twig', [
        ]);
    }

    /**
     * @Route("/home/team", name="team")
     */
    public function team()
    {
        $products = $this->entityManager->getRepository(Product::class)->findByIsBest(1);

        return $this->render('home/team.html.twig', [
        ]);
    }
}
