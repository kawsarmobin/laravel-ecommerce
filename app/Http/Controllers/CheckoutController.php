<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout');
    }

    public function pay()
    {
        // Set your secret key: remember to change this to your live secret key in production
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey('sk_test_UdW6chYEaiPvZsZRjDbhSYVZ');

        // Token is created using Stripe Checkout or Elements!
        // Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];
        $charge = Charge::create([
            'amount' => Cart::total() * 100,
            'currency' => 'usd',
            'description' => 'Practice selling books',
//            'source' => $token, /* OR */
            'source' => request()->stripeToken,
        ]);

        dd('Your card was charged successfully');
    }
}
