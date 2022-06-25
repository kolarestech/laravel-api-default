<?php

namespace App\Providers;

use App\Models\Like;
use App\Models\Short;
use App\Observers\LikeObserver;
use App\Observers\ShortObserver;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Short::observe(ShortObserver::class);
        Like::observe(LikeObserver::class);
    }
}
