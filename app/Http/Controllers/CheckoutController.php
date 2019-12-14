<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use Illuminate\Http\Request;
use App\Mail\PurchaseSuccessful;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your cart is still empty, do some shopping');
            return redirect()->back();
        }
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

        Session::flash('success', 'Purchase successful, wait for our email.');

        Cart::destroy();

        Mail::to(request()->stripeEmail)->send(new PurchaseSuccessful());

        return redirect('/');
    }
}
