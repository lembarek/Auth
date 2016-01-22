<?php

namespace Lembarek\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
              require __DIR__.'/../routes.php';
        }

        $this->loadViewsFrom(__DIR__.'/../views', 'auth');

        $this->app->bind(
            'Lembarek\Auth\Repositories\UserRepositoryInterface',
            'Lembarek\Auth\Repositories\UserRepository'
        );

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
    }
}
