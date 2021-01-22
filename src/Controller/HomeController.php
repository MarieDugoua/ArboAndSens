<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\ProductFormType;
use App\Form\RegistrationFormType;
use App\Form\UserFormType;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
     */
    public function products(Request $request, PaginatorInterface $paginator)
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(Product::class)->findBy([],['name' => 'desc']);

        $product = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            9 // Nombre de résultats par page
        );

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

    /**
     * @Route("/members", name="members")
     */

    public function members(Request $request, PaginatorInterface $paginator)
    {
        // Méthode findBy qui permet de récupérer les données avec des critères de filtre et de tri
        $donnees = $this->getDoctrine()->getRepository(User::class)->findBy([],['lastname' => 'asc']);

        $users = $paginator->paginate(
            $donnees, // Requête contenant les données à paginer
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            6 // Nombre de résultats par page
        );

        return $this->render('home/members.html.twig', [
            'user' => $users,
        ]);
    }

    /**
     * @Route("/members/{id}", name="member")
     * @param User $user
     */
    public function user(User $user)
    {
        return $this->render('home/member.html.twig', [
            'user' => $user,

        ]);
    }

    /**
     * @Route("/addMember", name="addMember")
     * @param User $user
     */

    public function addMember(Request $request, EntityManagerInterface $entityManager)
    {
        $newUser = new User();
        $form = $this->createForm(RegistrationFormType::class, $newUser);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($newUser);
            $entityManager->flush();

            $this->addFlash('success', 'Article added!');

            return $this->redirectToRoute('home');
        }

        return $this->render('home/addMember.html.twig', [
            "form" => $form->createView()

        ]);

    }

    /**
     * @Route("/member/{id}/update", name="updateMember")
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

            return $this->redirectToRoute('home');
        }

        return $this->render('home/updateMember.html.twig', [
            "form" => $form->createView()

        ]);
    }

    /**
     * @Route("/member/{id}/delete", name="deleteMember")
     * @param Product $product
     */
    public function deleteMember(User $user ){
        $del = $this->getDoctrine()->getManager();
        $del->remove($user);
        $del->flush();

        return $this->redirectToRoute('home');
    }
}

