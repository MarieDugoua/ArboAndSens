<?php

namespace App\Controller;

use App\classe\Cart;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StripeController extends AbstractController
{
    /**
     * @Route("/order/createSession", name="stripeCreateSession")
     */
    public function index(Cart $cart)
    {
        $productForStripe = [];
        $YOUR_DOMAIN = 'http://127.0.0.1:8889';

        foreach ($cart->getFull() as $product)
        {
            $productForStripe[] = [
                    'price_data' => [
                        'currency' => 'eur',
                        'unit_amount' => $product['product']->getPrice(),
                        'product_data' => [
                            'name' => $product['product']->getName(),
                            'images' => [$YOUR_DOMAIN."h/uploads/".$product['product']->getIllustration()],
                        ],
                    ],
                    'quantity' => $product['quantity'],
                ];
        }

        Stripe::setApiKey('sk_test_51IEILoAtFxgQJSRSLsuSscYfYR4jWs3vWZWsxEuz2GqPBUNujeGhyHwjl5ekToyKP6gCcTiiQpt49mYbaxc1kook00JQee3sxC');

        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                $productForStripe
            ],
            'mode' => 'payment',
            'success_url' => $YOUR_DOMAIN . '/success.html',
            'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
        ]);

        return new JsonResponse(['id' => $checkout_session->id]);
    }
}
