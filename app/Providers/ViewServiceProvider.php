<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Tag;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
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
        /*
        // Using class based composers...
        View::composer(
            'profile', 'App\Http\View\Composers\ProfileComposer'
        );
        */

        // Using Closure based composers...
        View::composer(['layouts.app','front.sidebar',"messenger.*"], function ($view) {
            //
            $view->with('categories',Category::orderBy('id','asc')->get());
            $view->with('tags',Tag::orderBy('id','asc')->get());
        });
    }
}
