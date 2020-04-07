<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories=DB::table('categories')->get();
        view()->composer('includes/header', function($view) use($categories) {
        $view->with('categories',$categories);
        });

        Schema::defaultStringLength(191);
    }
}
