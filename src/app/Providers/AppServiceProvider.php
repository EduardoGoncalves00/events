<?php

namespace App\Providers;

use App\Models\shopping_cart;
use App\Models\Zones;
use App\Services\TicketsService;
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
        $this->app->singleton(TicketsService::class, function ($app) {
            return new TicketsService(new Zones(), new shopping_cart());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
