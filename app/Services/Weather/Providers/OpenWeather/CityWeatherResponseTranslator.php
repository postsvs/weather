<?php

namespace App\Services\Weather\Providers\OpenWeather;

use App\Services\Weather\DTO\CityWeatherDTO;

/**
 * Class CityWeatherResponseTranslator
 * @package App\Services\Weather\Providers\OpenWeather
 */
class CityWeatherResponseTranslator
{
    private const KELVIN_IN_CELSIUS = 274.15;

    /**
     * @param array $response
     * @return CityWeatherDTO
     */
    public function translate(array $response): CityWeatherDTO
    {
        if ($response['cod'] !== 200) {
            throw new \RuntimeException('Incorrect response: ' . var_export($response, true));
        }

        return new CityWeatherDTO(
            $response['main']['temp'] / self::KELVIN_IN_CELSIUS,
            $response['weather'][0]['description'],
            $response['wind']['speed'],
            $response['main']['pressure'],
        );
    }
}
