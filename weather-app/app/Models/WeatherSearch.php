<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherSearch extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city', 'weather_data'];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
