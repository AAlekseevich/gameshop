<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function showProduct($id)
    {
        $random = DB::table('products')->orderByRaw("RAND()")->get();
        $products = $random->random(3);
        return view('product', ['product' => Products::find($id), 'products' => $products]);
    }
}
