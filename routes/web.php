<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;
use App\Http\Controllers\Frontend\RentalController as FrontendRentalController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Car;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () {
    return Inertia::render('Frontend/AboutPage');
})->name('about');
Route::get('/contact', function () {
    return Inertia::render('Frontend/ContactPage');
})->name('contact');
Route::get('/cars', [FrontendCarController::class, 'index'])->name('cars');
Route::get('/cars/{id}', [FrontendCarController::class, 'show'])->name('cars.show');

Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->group(
    function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
        Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
        Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
        Route::get('/cars/{id}', [CarController::class, 'show'])->name('cars.show');
        Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('cars.edit');
        Route::post('/cars/{id}', [CarController::class, 'update'])->name('cars.update');
        Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('cars.destroy');


        // rental
        Route::get('/rentals', [RentalController::class, 'index'])->name('rentals.index');
        Route::get('/rentals/edit/{rental}', [RentalController::class, 'edit'])->name('rentals.edit');
        Route::post('/rentals/{rental}', [RentalController::class, 'update'])->name('rentals.update');
        Route::delete('/rentals/delete/{rental}', [RentalController::class, 'destroy'])->name('rentals.destroy');
        // Route::get('/rentals/{id}', [RentalController::class, 'show'])->name('rentals.show');

        // customers
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
        Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    }
);

Route::middleware('auth')->group(function () {
    Route::post('/rentals', [FrontendRentalController::class, 'store'])->name('rentals.store');
    Route::get('/my-bookings', [FrontendRentalController::class, 'index'])->name('bookings.index');
    Route::get('/my-bookings/{id}', [FrontendRentalController::class, 'show'])->name('bookings.show');
    Route::get('/cars/{id}/book', [FrontendCarController::class, 'book'])->name('cars.book');
    Route::post('/rentals/{rental}/cancel', [FrontendRentalController::class, 'cancel'])->name('bookings.cancel');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
