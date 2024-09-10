<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService {
    public function getWeather($city) {
        $apiKey = env('WEATHER_API_KEY');
        $response = Http::get("http://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
}
