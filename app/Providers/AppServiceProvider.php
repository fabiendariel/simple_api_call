<?php

namespace App\Providers;

use App\Providers\DataProviders\SwapiDataProvider;
use App\Providers\DataProviders\ApiDatasProvider;
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
        $this->app->bind(ApiDatasProvider::class, function ($app) {
            return match (config('external-api.apiDatasProvider')) {
                'swapi' => new SwapiDataProvider(),
            };
        });
    }
}
