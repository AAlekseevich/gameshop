<?php

namespace App\Providers;

use App\Categories;
use App\Products;
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
                $categories = DB::table('category')->get();
                $random = DB::table('news')->orderByRaw("RAND()")->get();
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
