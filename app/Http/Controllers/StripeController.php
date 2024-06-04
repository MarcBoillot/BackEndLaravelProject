<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function storeIntents(Request $request)
    {


        $stripe = new \Stripe\StripeClient('sk_test_51PNVaLP7dXBscSDzH9ytv93LNuZsSTyqcohE2SCd8v2B0Xx3DxABU51gh7NcnMGiOb9fWDeFW32d7JOZWsjYINrT00NXPwQ4uU');


        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = $stripe->paymentIntents->create([
                'amount' => 1400,
                'currency' => 'eur',
                // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);
            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            return response()->json($output);

        } catch (Error $e) {
            http_response_code(500);
        }

    }
}
