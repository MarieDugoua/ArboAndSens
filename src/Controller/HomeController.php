<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @param ProductRepository $productRepository
     */
    public function index(ProductRepository $productRepository)
    {
        $product = $productRepository->findAll();
        return $this->render('home/index.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/products", name="products")
     * @param ProductRepository $productRepository
     */
    public function products(ProductRepository $productRepository)
    {
        $product = $productRepository->findAll();
        return $this->render('home/products.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/product/{id}", name="product")
     * @param Product $product
     */
    public function pdt(Product $product)
    {
        return $this->render('home/product.html.twig', [
            'product' => $product,

        ]);
    }

    /**
     * @Route("/addProduct", name="addProduct")
     * @param Product $product
     */

    public function add(Request $request, EntityManagerInterface $entityManager)
    {
        $newProduct = new Product();
        $form = $this->createForm(ProductFormType::class, $newProduct);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($newProduct);
            $entityManager->flush();

            $this->addFlash('success', 'Article added!');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/addProduct.html.twig', [
            "form" => $form->createView()

        ]);

    }

    /**
     * @Route("/product/{id}/update", name="updateProduct")
     * @param Product $product
     */

    public function edit(Product $product, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(ProductFormType::class, $product);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $offer = $form->getData();

            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Article Updated!');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/updateProduct.html.twig', [
            "form" => $form->createView()

        ]);
    }

    /**
     * @Route("/product/{id}/delete", name="deleteProduct")
     * @param Product $product
     */
    public function delete(Product $product ){
        $del = $this->getDoctrine()->getManager();
        $del->remove($product);
        $del->flush();

        return $this->redirectToRoute('home');
    }
}

