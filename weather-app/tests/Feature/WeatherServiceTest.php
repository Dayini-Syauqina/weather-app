<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\WeatherService;

class WeatherServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_weather_service_fetches_data() {
        $service = new WeatherService();
        $weather = $service->getWeather('London');
        $this->assertNotNull($weather);
    }

}

