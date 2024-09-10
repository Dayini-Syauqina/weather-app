<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // Import MustVerifyEmail
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail  // Implement MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship to the WeatherSearch model.
     *
     * This defines the relationship where a user can have many weather searches.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function weatherSearches()
    {
        return $this->hasMany(WeatherSearch::class); // Define the one-to-many relationship with WeatherSearch
    }
}
