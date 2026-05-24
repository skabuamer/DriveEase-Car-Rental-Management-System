<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rental;

class Car extends Model
{
    protected $fillable = [
        'name',
        'brand',
        'model',
        'year',
        'car_type',
        'daily_rent_price',
        'availablity',
        'image',
    ];

    function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
