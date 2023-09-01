<?php

namespace App\Http\Controllers;

require_once __DIR__ . '/../../../vendor/autoload.php';

use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripePaymentController extends Controller
{
    public function stripePost(Request $request)
    {
        $stripe = new StripeClient(env('STRIPE_SECRET'));

        $res = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
                'number' => $request->number,
                'exp_month' => $request->exp_month,
                'exp_year' => $request->exp_year,
                'cvc' => $request->cvc,
            ],
        ]);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $response = $stripe->paymentIntents->create([
            'amount' => $request->amount,
            'currency' => 'brl',
            'payment_method' => $res->id,
            'confirmation_method' => 'automatic',
            'confirm' => true,
            'description' => $request->description,
        ]);

        return response()->json([$response->status], 201);
    }
}
