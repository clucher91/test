<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Sensor\SensorService;
use App\Services\CRUDService;

class SensorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CRUDService::class, function() {
            return new SensorService;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
