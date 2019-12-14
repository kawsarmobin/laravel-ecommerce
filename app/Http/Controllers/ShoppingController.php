<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingController extends Controller
{
    public function addToCart()
    {
        $pdt = Product::findOrFail(request()->pdt_id);

        // First we'll add the item to the cart.
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => request()->qty,
            'price' => $pdt->price,
        ]);

        // Next we associate a model with the item.
        Cart::associate($cartItem->rowId, 'App\Models\Product');

        Session::flash('success', 'Product added to cart.');
        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }

    public function cartDestroy($id)
    {
        Cart::remove($id);
        Session::flash('success', 'Product removed to cart.');
        return redirect()->back();
    }

    public function increase($id, $qty)
    {
        Cart::update($id, $qty + 1);
        Session::flash('success', 'Product quantity updated.');
        return redirect()->back();
    }

    public function decrease($id, $qty)
    {
        Cart::update($id, $qty - 1);
        Session::flash('success', 'Product quantity updated.');
        return redirect()->back();
    }

    public function rapidAdd($id)
    {
        $pdt = Product::findOrFail($id);

        // First we'll add the item to the cart.
        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'qty' => 1,
            'price' => $pdt->price,
        ]);

        // Next we associate a model with the item.
        Cart::associate($cartItem->rowId, 'App\Models\Product');

        Session::flash('success', 'Product added to cart.');
        return redirect()->route('cart');
    }
}
