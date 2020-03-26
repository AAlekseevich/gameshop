<?php

namespace App\Http\Controllers;

use App\News;
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
}
