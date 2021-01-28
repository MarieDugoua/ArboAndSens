<?php

namespace App\Controller;

use App\Entity\Address;
use App\classe\Cart;
use App\Form\AddressType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class AccountAddressController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/account/address", name="address")
     */
    public function index()
    {
        return $this->render('account/address.html.twig', [
        ]);
    }

    /**
     * @Route("/account/addAddress", name="addAddress")
     */
    public function add(Cart $cart, Request $request)
    {
        $address = new Address();

        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid())
        {
            $address->setUser($this->getUser());
            $this->entityManager->persist($address);
            $this->entityManager->flush();

            if ($cart->get())
            {
                return $this->redirectToRoute('order');
            } else
            {
                return $this->redirectToRoute('address');
            }
        }

        return $this->render('account/formAddress.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/account/editAddress/{id}", name="editAddress")
     */
    public function edit(Request $request, $id)
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneById($id);

        if (!$address || $address->getUser() != $this->getUser())
        {
            return $this->redirectToRoute('address');
        }

        $form = $this->createForm(AddressType::class, $address);
        $form->handleRequest($request);

        if($form->isSubmitted() and $form->isValid())
        {
            $this->entityManager->flush();

            return $this->redirectToRoute('address');
        }

        return $this->render('account/formAddress.html.twig', [
            'form' => $form->createView(),
        ]);
    }

     /**
     * @Route("/account/deleteAddress/{id}", name="deleteAddress")
     */
    public function delete($id)
    {
        $address = $this->entityManager->getRepository(Address::class)->findOneById($id);

        if ($address and $address->getUser() == $this->getUser())
        {
            $this->entityManager->remove($address);
            $this->entityManager->flush();
        }

        return $this->RedirectToRoute('address');
    }
}
