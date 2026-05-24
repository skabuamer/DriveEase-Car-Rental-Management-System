<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    function index(Request $request)
    {
        $cars = Car::query();

        if ($request->car_type) {
            $cars->where('car_type', $request->car_type);
        }

        if ($request->brand) {
            $cars->where('brand', $request->brand);
        }

        if ($request->min_price) {
            $cars->where(
                'daily_rent_price',
                '>=',
                $request->min_price
            );
        }

        if ($request->max_price) {
            $cars->where(
                'daily_rent_price',
                '<=',
                $request->max_price
            );
        }

        if ($request->sort === 'low_high') {
            $cars->orderBy('daily_rent_price', 'asc');
        }

        if ($request->sort === 'high_low') {
            $cars->orderBy('daily_rent_price', 'desc');
        }

        if ($request->sort === 'newest') {
            $cars->latest();
        }
        return Inertia::render('Frontend/CarsPage', [
            'cars' =>  $cars->get(),
            'filters' => $request->all(),
        ]);
    }

    function show(Request $request, string $id)
    {
        $car = Car::findOrFail($id);
        return Inertia::render('Frontend/CarDetailsPage', [
            'car' => $car,
        ]);
    }

    function book(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        return Inertia::render('Frontend/CarBookPage', [
            'id' => $id,
            'car' => $car,
        ]);
    }
}
