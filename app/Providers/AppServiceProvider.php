<?php

namespace App\Providers;

use App\Contracts\CovidDataServiceInterface;
use App\Services\CovidDataService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CovidDataServiceInterface::class, function ($app) {
            return new CovidDataService(config('services.covid_api.url'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
