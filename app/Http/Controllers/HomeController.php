<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Support\Facades\Config;

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
        $products = Products::orderBy('id')
            ->paginate(Config::get('constants.options.prod_to_page'));
        return view('index', ['products' => $products]);
    }

    public function search()
    {
        $data = $_POST['search'];
        $results = Products::where('name','like','%'. $data .'%')
            ->paginate(Config::get('constants.options.prod_to_page'));
        return view('search', ['results' => $results]);
    }
}
