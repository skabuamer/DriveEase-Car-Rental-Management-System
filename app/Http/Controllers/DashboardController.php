<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    function index(Request $request)
    {
        $cars = Car::count();
        $availableCars = Car::where('availablity', true)->count();
        $customers = User::where('role', 'customer')->count();
        $rentals = Rental::count();
        $earnings = Rental::sum('total_cost');

        return Inertia::render('Dashboard', [
            'cars' => $cars,
            'availableCars' => $availableCars,
            'customers' => $customers,
            'rentals' => $rentals,
            'earnings' => $earnings,
        ]);
    }
}
