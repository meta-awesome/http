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
        $this->app->make('Metawesome\Http\PerformsRequests');
        $this->app->make('Metawesome\Http\Controller');
        $this->app->make('Metawesome\Http\AuthController');
        // $this->app->make('Metawesome\Http\Request');

        $this->app->singleton('ws.client', function ($app) {
            return new Client(new \GuzzleHttp\Client([
                'verify'   => false,
                'headers'  => [
                    'Accept' => 'application/json',
                ],
                'base_uri' => $app['config']->get('unimed.webservice.path'),
            ]));
        });

        $this->app->singleton(ClientContract::class, function ($app) {
            return $app['ws.client'];
        });
        
    }
}
