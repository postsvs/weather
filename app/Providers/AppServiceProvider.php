<?php

namespace App\Providers;

use App\Services\Weather\CityWeatherGettingService;
use App\Services\Weather\Providers\OpenWeather\CityWeatherResponseTranslator;
use App\Services\Weather\Providers\OpenWeather\WeatherGettingService;
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
        $this->app->singleton(CityWeatherGettingService::class, static function () {
            return new CityWeatherGettingService(
                new WeatherGettingService(
                    app()->get(CityWeatherResponseTranslator::class),
                ),
            );
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
