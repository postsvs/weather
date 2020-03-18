<?php

namespace App\Services\Weather;

use App\Services\Weather\DTO\CityWeatherDTO;
use App\Services\Weather\Providers\WeatherGettingInterface;
use Illuminate\Support\Facades\Cache;

/**
 * Class CityWeatherGettingService
 * @package App\Services\Weather
 */
class CityWeatherGettingService
{

    private WeatherGettingInterface $weatherGettingProviderService;

    /**
     * CityWeatherGettingService constructor.
     * @param WeatherGettingInterface $weatherGettingProviderService
     */
    public function __construct(WeatherGettingInterface $weatherGettingProviderService)
    {
        $this->weatherGettingProviderService = $weatherGettingProviderService;
    }

    /**
     * @param string $cityName
     * @return CityWeatherDTO
     */
    public function get(string $cityName): CityWeatherDTO
    {
        $cacheKey = $this->getCacheKey($cityName);

        return Cache::remember($cacheKey, 5000, function () use ($cityName) {
            return $this->weatherGettingProviderService->getCityWeather($cityName);
        });
    }

    /**
     * @param string $cityName
     * @return string
     */
    private function getCacheKey(string $cityName): string
    {
        return get_class($this->weatherGettingProviderService) . $cityName;
    }
}
