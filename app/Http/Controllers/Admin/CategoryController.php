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
        $categories = DB::table('category')->get();
        return view('admin.category.category', ['categories' => $categories]);
    }

    public function create($data)
    {
        return redirect()->route('category');
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit()
    {

    }

    public function remove($id)
    {
        DB::table('category')->where('id', '=', $id)->delete();
        return redirect()->route('category');
    }

}
