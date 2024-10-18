<?php

namespace App\Providers;

use App\Contracts\Repositories\CovidDataRepositoryInterface;
use App\Models\CovidData;
use App\Repositories\CovidDataRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CovidDataRepositoryInterface::class, function($app) {
            return new CovidDataRepository(new CovidData());
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
