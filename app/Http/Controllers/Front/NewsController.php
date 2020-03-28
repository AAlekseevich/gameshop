<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Products;
use Illuminate\Support\Facades\Config;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('id')
            ->paginate(Config::get('constants.options.news_to_page'));
        return view('news.news', ['news' => $news]);
    }

    public function singleNews($id)
    {
        $random = Products::orderByRaw("RAND()")->get();
        $products = $random->random(Config::get('constants.options.count_random_prod'));
        return view('news.single-news', ['news' => News::find($id), 'products' => $products]);
    }
}
