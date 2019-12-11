<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
            ->with('products', Product::paginate(3));
    }

    public function singleProduct($id)
    {
        return view('single')
            ->with('product', Product::findOrFail($id));
    }
}
