<?php

namespace App\Services\Weather\Formatter;

use App\Services\Weather\DTO\CityWeatherDTO;

/**
 * Class CityWeatherDTOFormatter
 * @package App\Services\Weather\DTO
 */
class CityWeatherDTOFormatter
{
    /**
     * @param string $cityName
     * @param CityWeatherDTO $weatherDTO
     * @return array
     */
    public function format(string $cityName, CityWeatherDTO $weatherDTO): array
    {
        return [
            'city' => $cityName,
            'weather_state' => $weatherDTO->getState(),
            'temperature' => $weatherDTO->getTemperature(),
            'wind_speed' => $weatherDTO->getWindSpeed(),
            'pressure' => $weatherDTO->getPressure(),
        ];
    }
}
