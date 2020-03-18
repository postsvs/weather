<?php
namespace App\Services\Weather\Providers;



use App\Services\Weather\DTO\CityWeatherDTO;

/**
 * Interface WeatherGettingInterface
 * @package App\Services\Weather\Providers
 */
interface WeatherGettingInterface
{
    /**
     * @param string $cityName
     * @return CityWeatherDTO
     */
    public function getCityWeather(string $cityName): CityWeatherDTO;
}
