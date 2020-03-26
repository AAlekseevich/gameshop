<?php

namespace App\Http\Controllers\Admin;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function products()
    {
        $products = DB::table('products')->get();
        return view('admin.products', ['products' => $products]);
    }

    public function edit()
    {

    }

    public function remove($id)
    {
        DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->route('products');
    }
}
