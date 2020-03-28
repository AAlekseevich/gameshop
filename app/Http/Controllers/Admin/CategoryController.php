<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Categories::get();
        return view('admin.category.category', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $data = $request->only(['name', 'description']);
        Categories::create($data);
        return redirect()->route('category');
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Categories::find($id), 'id' => $id]);
    }

    public function update(Request $request)
    {
        $id = $_POST['id'];
        $data = $request->only(['name', 'description']);
        Categories::find($id)->update($data);
        return redirect()->route('category');
    }

    public function remove($id)
    {
        Categories::destroy($id);
        return redirect()->route('category');
    }

}
