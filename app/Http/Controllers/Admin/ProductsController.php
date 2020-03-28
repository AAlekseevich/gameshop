<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Products::get();
        return view('admin.products.products', ['products' => $products]);
    }

    public function create(Request $request)
    {
        $image = $request->file('image')->storeAs('img/products', $request->input('name') . '.jpg', 'public');

        $data = $request->only(['name', 'category', 'price', 'count', 'description']);
        $data['image'] = $image;

        Products::create($data);
        return redirect()->route('products');
    }

    public function add()
    {
        return view('admin.products.add', ['categories'=> Categories::get()]);
    }

    public function edit($id)
    {
        return view('admin.products.edit', ['product' => Products::find($id), 'categories'=> Categories::get(), 'id' => $id]);
    }

    public function update(Request $request)
    {
        $image = $request->file('image')->storeAs('/img/products', $request->input('name') . '.jpg', 'public');

        $data = $request->only(['name', 'category', 'price', 'count', 'description']);
        $data['image'] = $image;

        $id = $_POST['id'];
        Products::find($id)->update($data);
        return redirect()->route('products');
    }

    public function remove($id)
    {
        Products::destroy($id);
        return redirect()->route('products');
    }
}
