<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\ProductFormType;
use App\Form\RegistrationFormType;
use App\Repository\OrderHistoryRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
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
            'products' => $product,
        ]);
    }

    /**
     * @Route("/presentation", name="presentation")
     */
    public function presentation()
    {
        return $this->render('home/presentation.html.twig', [
        ]);
    }

    /**
     * @Route("/equipe", name="equipe")
     */
    public function equipe()
    {
        return $this->render('home/equipe.html.twig', [
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
            'products' => $product,
        ]);
    }

    /**
     * @Route("/product/{id}", name="product")
     * @param Product $product
     */
    public function product(Product $product)
    {
        return $this->render('home/product.html.twig', [
            'product' => $product,

        ]);
    }

    /**
     * @Route("/profile", name="profile")
     */
    public function profile()
    {
        return $this->render('home/profile.html.twig', [

        ]);
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin(UserRepository $userRepository, OrderHistoryRepository $historyRepository)
    {

        $users = $userRepository->findAll();
        $orders = $userRepository->findAll();

        return $this->render('home/admin.html.twig', [
            'users' => $users,
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/shopping", name="shopping")
     * @param Product $product
     */
    public function shopping(SessionInterface $session, ProductRepository $productRepository)
    {
        $shopBag = $session->get('shopBag', []);
        $shopBagData = [];

        foreach ($shopBag as $id => $quantity){
            $shopBagData[]= [
                'product' => $productRepository->find($id),
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($shopBagData as $item){
            $totalItem = $item['product']->getPrice() * $item['quantity'];
            $total += $totalItem;
        }

        return $this->render('home/shopping.html.twig', [
            'items' => $shopBagData,
            'total' => $total,
        ]);
    }

    /**
     * @Route("/shopping/shoppingAdd/{id}", name="shoppingAdd")
     */
    public function shoppingAdd($id, SessionInterface $session)
    {
        $shopBag = $session->get('shopBag', []);

        if(!empty($shopBag[$id])){
            $shopBag[$id]++;
        }else {
            $shopBag[$id] = 1;
        }

        $session->set('shopBag', $shopBag);
        return $this->redirectToRoute("products");

    }

    /**
    *@Route("/shopping/shopDel/{id}", name="shopDel")
     */
    public function shopDel($id, SessionInterface $session)
    {
        $shopBag = $session->get('shopBag', []);

        if (!empty($shopBag[$id])) {
            unset($shopBag[$id]);
        }

        $session->set('shopBag', $shopBag);
        return $this->redirectToRoute("shopping");
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

        return $this->redirectToRoute('products');
    }
    /**
     * @Route("/admin/{id}/update", name="updateMember")
     * @param User $user
     */

    public function editMember(User $user, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $offer = $form->getData();

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Article Updated!');

            return $this->redirectToRoute('admin');
        }

        return $this->render('home/updateMember.html.twig', [
            "form" => $form->createView()

        ]);
    }

    /**
     * @Route("/admin/{id}/delete", name="deleteMember")
     * @param Product $product
     */
    public function deleteMember(User $user ){
        $del = $this->getDoctrine()->getManager();
        $del->remove($user);
        $del->flush();

        return $this->redirectToRoute('admin');
    }
}
