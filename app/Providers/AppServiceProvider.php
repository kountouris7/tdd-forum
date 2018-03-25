<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() //'*' =  share this variable with every view
    {
        \View::composer('*', function ($view) {
        $view->with('channels', \App\Channel::all());
        });
        //  Or i could refactor to this->     \View::share('channels', \App\Channel::all());
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
