<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\AdminBookingNotification;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class RentalController extends Controller
{
    function index()
    {
        $rentals = Rental::where('user_id', auth()->id())->with('car')->get();
        return Inertia::render('Frontend/MyBookingsPage', [
            'rentals' => $rentals,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $car = Car::findOrFail($request->car_id);

        $days = Carbon::parse($request->start_date)
            ->diffInDays($request->end_date);

        $total = $days * $car->daily_rent_price;

        $alreadyBooked = Rental::where(
            'car_id',
            $car->id
        )->where(
            'status',
            '!=',
            'cancelled'
        )->where(
            'start_date',
            '<=',
            $request->end_date
        )->where(
            'end_date',
            '>=',
            $request->start_date
        )->exists();

        if ($alreadyBooked) {
            return back()->with([
                'error' => 'Car already booked for selected dates.'
            ]);
        }

        $booking = Rental::create([
            'user_id' => auth()->id(),
            'car_id' => $car->id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $total,
            'status' => 'ongoing',
        ]);

        Mail::to(auth()->user()->email)
            ->send(new \App\Mail\BookConfirmMail($booking));

        $admin = User::where('role', 'admin')->first();

        Mail::to($admin->email)
            ->send(new AdminBookingNotification($booking));

        session()->flash('success', 'Booking created.');
        return redirect()->route('bookings.index');
    }

    function show(Request $request, $id)
    {
        $rental = Rental::where('user_id', auth()->id())->with('car')->findOrFail($id);

        return Inertia::render('Frontend/BookingDetailPage', [
            'rental' => $rental,
        ]);
    }

    function cancel(Rental $rental)
    {
        if ($rental->user_id !== auth()->id()) {
            abort(403);
        }

        // cannot cancel after start date
        if (now()->toDateString() >= $rental->start_date) {
            return back()->with('error', 'Rental already started.');
        }

        $rental->update([
            'status' => 'cancelled'
        ]);

        return back()->with(['success' => 'Booking canceled.']);
    }
}
