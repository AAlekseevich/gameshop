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

    public function edit()
    {

    }

    public function remove($id)
    {
        Products::destroy($id);
        return redirect()->route('products');
    }
}
