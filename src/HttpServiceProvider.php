<?php

namespace Metawesome\Http;

use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Metawesome\Http\ClientContract');
        $this->app->make('Metawesome\Http\PerformsRequests');
        $this->app->make('Metawesome\Http\Controller');
        $this->app->make('Metawesome\Http\AuthController');
        // $this->app->make('Metawesome\Http\Request');
    }
}
