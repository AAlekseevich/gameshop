<?php

namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Products;

class ProductController extends Controller
{
    public function showProduct($id)
    {
        $random = Products::orderByRaw("RAND()")->get();
        $products = $random->random(3);
        return view('product', ['product' => Products::find($id), 'products' => $products]);
    }
}
