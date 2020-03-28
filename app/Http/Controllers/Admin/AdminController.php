<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $countCategory = Categories::count();
        $countUsers = User::count();
        $countProducts = Products::count();
        $countOrders = Orders::count();
        return view('admin.index', ['countCategory' => $countCategory, 'countUsers' => $countUsers, 'countProducts' => $countProducts, 'countOrders' => $countOrders]);
    }

    public function changemail()
    {
        return view('admin.changemail');
    }
}
