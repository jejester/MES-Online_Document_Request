<?php

namespace App\Providers;

use Filament\Facades\Filament;

use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                // ...
                'logout' => UserMenuItem::make()->label('Log out'),
            ]);
        });

        Validator::extend('recaptcha', 'App\\Validators\ReCaptcha@validate');
    }
}
