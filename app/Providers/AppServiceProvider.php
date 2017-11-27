<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Get and pass the categories to the app layout 
        view()->composer('layouts.app', function($view)
        {
            $categories = Category::active()->get();
            $view->with('categories', $categories);
        });

        Blade::if('admin', function() {
            return auth()->user()->checkIfUserIs('admin');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
