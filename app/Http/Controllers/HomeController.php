<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
            ->orderBy('id')
            ->paginate(6);
        return view('index', ['products' => $products]);
    }

    public function search()
    {
        $data = $_POST['search'];
        $results = DB::table('products')
            ->where('name','like','%'. $data .'%')
            ->paginate(6);
        return view('search', ['results' => $results]);
    }
}
