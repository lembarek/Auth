<?php

 namespace Lembarek\Auth\Providers;

use Lembarek\Core\Providers\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->fullBoot('auth', __DIR__.'/../');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Lembarek\Auth\Repositories\UserRepositoryInterface',
            'Lembarek\Auth\Repositories\UserRepository'
        );

        $this->app->bind(
            'Lembarek\Auth\Repositories\ResetPasswordRepositoryInterface',
            'Lembarek\Auth\Repositories\ResetPasswordRepository'
        );

    }
}
