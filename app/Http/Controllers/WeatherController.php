<?php

namespace App\Http\Controllers;

use App\Services\Weather\CityWeatherGettingService;
use App\Services\Weather\Formatter\CityWeatherDTOFormatter;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


/**
 * Class WeatherController
 * @package App\Http\Controllers
 */
class WeatherController extends Controller
{
    /**
     * @param Request $request
     * @param CityWeatherGettingService $service
     * @param CityWeatherDTOFormatter $formatter
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getCityWeather(
        Request $request,
        CityWeatherGettingService $service,
        CityWeatherDTOFormatter $formatter
    ): JsonResponse {

        $this->validate($request,[
            'city' => 'required|string'
        ]);

        $cityName = $request->input('city');
        $weather = $service->get($cityName);

        return new JsonResponse(
            $formatter->format($cityName, $weather),
        );
    }
}

