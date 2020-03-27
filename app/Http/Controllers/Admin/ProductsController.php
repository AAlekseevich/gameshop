<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager as Image;

class ProductsController extends Controller
{
    public function products()
    {
        $products = Products::get();
        return view('admin.products.products', ['products' => $products]);
    }

    public function create()
    {
        if(!empty($_FILES['image']['tmp_name'])) {
            $tmpPhoto = $_FILES['image']['tmp_name'];
            $namePhoto = $_FILES['image']['name'];

            $imagePath = public_path() . '/image/';
            $manager = new Image(array('driver' => 'gd'));
            $manager->make($tmpPhoto)->save($imagePath . $namePhoto);
            $image = '/image/' . $namePhoto;
        } else {
            $image = '';
        }

        $data = [
            'name' => $_POST['name'],
            'category' => $_POST['category'],
            'price' => $_POST['price'],
            'count' => $_POST['count'],
            'description' => $_POST['description'],
            'image' => $image
        ];
        Products::firstOrCreate($data);
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

    public function update()
    {
        if(!empty($_FILES['image']['tmp_name'])) {
            $tmpPhoto = $_FILES['image']['tmp_name'];
            $namePhoto = $_FILES['image']['name'];

            $imagePath = public_path() . '/image/';
            $manager = new Image(array('driver' => 'gd'));
            $manager->make($tmpPhoto)->save($imagePath . $namePhoto);
            $image = '/image/' . $namePhoto;
        } else {
            $image = '';
        }

        $id = $_POST['id'];
        $product = Products::find($id);
        $product->name = $_POST['name'];
        $product->category = $_POST['category'];
        $product->price = $_POST['price'];
        $product->count = $_POST['count'];
        $product->description = $_POST['description'];
        $product->image = $image;
        $product->save();
        return redirect()->route('products');
    }

    public function remove($id)
    {
        Products::destroy($id);
        return redirect()->route('products');
    }
}
