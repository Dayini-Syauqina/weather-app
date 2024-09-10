# Laravel Weather Search Application

## Overview

This Laravel application allows users to search for weather information for various cities and view their search history. Weather data is retrieved from the OpenWeatherMap API and stored in database. The application provides a dashboard to view past searches, including the city, temperature, weather description, and search date.

## Features

- User registration and authentication
- Search weather information for a city
- Store weather searches in a database
- View weather search history in a dashboard

## Technical Specification

- The application is built with Laravel 11.22.0 and PHP 8.3.8
- The project uses SQLite for local development.
- Users are authenticated using Laravel Breeze.
- Weather data is retrieved from the OpenWeatherMap API.

## Error logs

- Errors or issues in the Laravel logs located at storage/logs/laravel.log

## Setup Instructions

1. Clone the repository to your local machine => git clone https://github.com/Dayini-Syauqina/weather-app.git
2. cd weather-app
3. Start development server => php artisan serve
4. Open your web browser and navigate to http://127.0.0.1:800

## Run Tests

- php artisan test

