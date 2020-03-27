<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Categories::get();
        return view('admin.category.category', ['categories' => $categories]);
    }

    public function create()
    {
        $data = [
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ];
        Categories::firstOrCreate($data);
        return redirect()->route('category');
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit()
    {
        return view( 'admin.category.edit');
    }

    public function remove($id)
    {
        Categories::destroy($id);
        return redirect()->route('category');
    }

}
