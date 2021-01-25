<?php

namespace App\Controller;

use App\Entity\Address;
use App\Entity\PaymentInfo;
use App\Entity\User;
use App\Form\AddressFormType;
use App\Form\PaymentFormType;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/registration", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $user = new User();
        $address = new Address();
        $payment = new PaymentInfo();

        $form = $this->createForm(RegistrationFormType::class, $user);
        $formAddress = $this->createForm(AddressFormType::class, $address);
        $formPayment = $this->createForm(PaymentFormType::class, $payment);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_USER']);
            $address->setUser($this->getId($user));
            $payment->setUser($this->getId($user));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->persist($address);
            $entityManager->persist($payment);

            $entityManager->flush();
            // do anything else you need here, like send an email

            return $guardHandler->authenticateUserAndHandleSuccess(
                $user,
                $request,
                $authenticator,
                'main' // firewall name in security.yaml
            );
        }

        return $this->render('registration/index.html.twig', [
            'registrationForm' => $form->createView(),
            'addressForm' => $formAddress->createView(),
            'paymentForm' => $formPayment->createView(),
        ]);

    }
}
