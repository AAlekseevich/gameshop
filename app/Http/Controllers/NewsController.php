<?php

namespace App\Http\Controllers;

use App\News;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id')
            ->paginate(3);
        return view('news.news', ['news' => $news]);
    }

    public function singleNews($id)
    {
        $random = DB::table('products')->orderByRaw("RAND()")->get();
        $products = $random->random(3);
        return view('news.single-news', ['news' => News::find($id), 'products' => $products]);
    }
}
