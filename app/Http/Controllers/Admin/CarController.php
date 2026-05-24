<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::latest()->get();

        return Inertia::render('Admin/CarsPage', [
            'cars' => $cars
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/CarCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'year'  => 'required|integer|min:1900|max:' . date('Y'),
                'car_type'  => 'required',
                'daily_rent_price'  => 'required|numeric|min:0',
                'availablity'  => 'required|boolean',
                'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]
        );

        $data = [
            'name' => $request->input('name'),
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'year' => $request->input('year'),
            'car_type' => $request->input('car_type'),
            'daily_rent_price' => $request->input('daily_rent_price'),
            'availablity' => $request->input('availablity'),
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        Car::create($data);

        return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);

        return Inertia::render('Admin/CarEdit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'year'  => 'required|integer|min:1900|max:' . date('Y'),
                'car_type'  => 'required',
                'daily_rent_price'  => 'required|numeric|min:0',
                'availablity'  => 'required|boolean',
                'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]
        );

        $car = Car::findOrFail($id);

        $car->name = $request->input('name');
        $car->brand = $request->input('brand');
        $car->model = $request->input('model');
        $car->year = $request->input('year');
        $car->car_type = $request->input('car_type');
        $car->daily_rent_price = $request->input('daily_rent_price');
        $car->availablity = $request->input('availablity');

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('uploads', 'public');
        }

        $car->save();

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);

        $car->delete();

        return redirect()->route('cars.index');
    }
}
