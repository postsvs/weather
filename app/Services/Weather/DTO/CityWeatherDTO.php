<?php

namespace App\Services\Weather\DTO;

/**
 * Class CityWeatherDTO
 * @package App\Services\DTO
 */
class CityWeatherDTO
{
    private int $temperature;
    private string $state;
    private int $windSpeed;
    private int $pressure;

    /**
     * CityWeatherDTO constructor.
     * @param int $temperature
     * @param string $state
     * @param int $windSpeed
     * @param int $windDirection
     */
    public function __construct(int $temperature, string $state, int $windSpeed, int $windDirection)
    {
        $this->temperature = $temperature;
        $this->state = $state;
        $this->windSpeed = $windSpeed;
        $this->pressure = $windDirection;
    }

    /**
     * @return int
     */
    public function getTemperature(): int
    {
        return $this->temperature;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }

    /**
     * @return int
     */
    public function getWindSpeed(): int
    {
        return $this->windSpeed;
    }

    /**
     * @return int
     */
    public function getPressure(): int
    {
        return $this->pressure;
    }
}
