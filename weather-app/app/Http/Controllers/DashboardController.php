<?php

namespace App\Http\Controllers;

use App\Models\WeatherSearch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch weather search history for the logged-in user
        $history = WeatherSearch::where('user_id', auth()->id())->get();

        // Return the dashboard view with the weather search history
        return view('dashboard', compact('history'));
    }

}
