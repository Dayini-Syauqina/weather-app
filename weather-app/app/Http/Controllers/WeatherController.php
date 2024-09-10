<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller {
    protected $weatherService;

    public function __construct(WeatherService $weatherService) {
        $this->weatherService = $weatherService;
    }

    public function search(Request $request) {
        $city = $request->input('city');
        $weather = $this->weatherService->getWeather($city);

        if (!$weather) {
            return redirect()->back()->withErrors('City not found or API error');
        }

        return view('weather', compact('weather'));
    }
}
