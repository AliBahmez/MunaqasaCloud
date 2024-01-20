<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Account\AccountService;
use App\Services\Profile\ProfileService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('account', function ($app) {
            return new AccountService();
        });
        //
        // $this->app->bind('profile', function ($app) {
        //     return new ProfileService();
        // });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
