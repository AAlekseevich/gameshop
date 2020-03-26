<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $countCategory = DB::table('category')->count();
        $countUsers = DB::table('users')->count();
        $countProducts = DB::table('products')->count();
        return view('admin.index', ['countCategory' => $countCategory, 'countUsers' => $countUsers, 'countProducts' => $countProducts]);
    }

    public function changemail()
    {
        return view('admin.changemail');
    }
}
