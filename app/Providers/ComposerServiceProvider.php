<?php

namespace App\Providers;

use App\Models\Categories;
use App\Models\News;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'layouts.app', function ($view) {
                $categories = Categories::get();
                $random = News::orderByRaw("RAND()")->get();
                $randomNews = $random->random(3);
                $randProduct = Products::orderByRaw("RAND()")->first();
                $view->with(['categories' => $categories, 'randomNews' => $randomNews, 'randProduct' => $randProduct]);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
