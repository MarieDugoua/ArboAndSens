<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountOrderController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/account/order", name="accountOrder")
     */
    public function index()
    {
        $orders = $this->entityManager->getRepository(Order::class)->findSuccessOrders($this->getUser());

        return $this->render('account/order.html.twig', [
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/account/orderShow/{id}", name="orderShow")
     */
    public function show($id)
    {
        $order = $this->entityManager->getRepository(Order::class)->findOneById($id);
        if(!$order || $order->getUser() != $this->getUser())
        {
            return $this->redirectToRoute('accountOrder');
        }

        return $this->render('account/orderShow.html.twig', [
            'order' => $order,
        ]);
    }
}
