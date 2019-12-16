<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Stripe;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @param Request $request
     * @return string
     */
    public function stripePost(Request $request)
    {
        /*Name: Test
        Number: 4242 4242 4242 4242
        CSV: 123
        Expiration Month: 12
        Expiration Year: 2024*/

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $pay = Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "rwf",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);
        //        return $pay['id'] .' '. $pay['status'];
        return $pay;
    }
}
