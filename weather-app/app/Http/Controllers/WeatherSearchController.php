<?php

namespace App\Http\Controllers;

use App\Models\WeatherSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherSearchController extends Controller
{
    public function search(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'city' => 'required|string|max:255',
        ]);

        $city = $request->input('city');
        $apiKey = env('WEATHER_API_KEY'); // Ensure your API key is correctly set in .env
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if ($response->successful()) {
            $weatherData = $response->json();

            // Save the search to the database
            WeatherSearch::create([
                'user_id' => auth()->id(),
                'city' => $city,
                'weather_data' => json_encode($weatherData),
            ]);

            return redirect()->route('dashboard')->with('status', 'Weather search saved!');
        } else {
            return redirect()->route('dashboard')->withErrors('Failed to fetch weather data.');
        }
    }
}
