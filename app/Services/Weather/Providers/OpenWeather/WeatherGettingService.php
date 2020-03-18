<?php

namespace App\Services\Weather\Providers\OpenWeather;

use App\Services\Weather\DTO\CityWeatherDTO;
use App\Services\Weather\Providers\WeatherGettingInterface;
use Illuminate\Support\Facades\Http;

/**
 * Class WeatherGettingService
 * @package App\Services\Weather\Providers\OpenWeather
 */
class WeatherGettingService implements WeatherGettingInterface
{

    private const API_URL = 'api.openweathermap.org/data/2.5/weather';
    private const CITY = 'q';
    private const API_SECRET = 'appid';

    private CityWeatherResponseTranslator $responseTranslator;

    /**
     * WeatherGettingService constructor.
     * @param CityWeatherResponseTranslator $responseTranslator
     */
    public function __construct(CityWeatherResponseTranslator $responseTranslator)
    {
        $this->responseTranslator = $responseTranslator;
    }

    /**
     * @param string $cityName
     * @return CityWeatherDTO
     */
    public function getCityWeather(string $cityName): CityWeatherDTO
    {
        $response = Http::get(self::API_URL, [
            self::CITY => $cityName,
            self::API_SECRET => $this->getApiKey(),
        ]);

        $responseRaw = json_decode($response->body(), true, 512, JSON_THROW_ON_ERROR);

        return $this->responseTranslator->translate($responseRaw);

    }

    /**
     * @return string
     */
    private function getApiKey(): string
    {
        $key = env('OPENWEATHER_API_SECRET');

        if (empty($key)) {
            throw new \RuntimeException('OpenWeather API secret has required');
        }

        return $key;
    }
}
