<?php

namespace App\Providers;

use App\Observers\PostObserver;
use App\Models\Post;

use Illuminate\Support\ServiceProvider;

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
        setlocale(LC_ALL, 'ja_JP.UTF-8');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Post::observe(PostObserver::class);
    }
}
