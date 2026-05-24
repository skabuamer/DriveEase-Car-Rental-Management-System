<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Car;
use App\Models\User;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'car_id',
        'start_date',
        'end_date',
        'total_cost',
        'status',
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function car()
    {
        return $this->belongsTo(Car::class);
    }
}
