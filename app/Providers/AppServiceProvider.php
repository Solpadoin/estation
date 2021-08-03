<?php

namespace App\Providers;

use App\Services\EstationService;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
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
        $this->app->singleton(EstationService::class, function ($app) {
            return new EstationService();
        });

        foreach (Config::get('extensions.list', []) as $plugin) {
            $this->app->singleton($plugin, function ($app) use ($plugin) {
                return new $app();
            });
        }
    }
}
