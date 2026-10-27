<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Room;
use Carbon\Carbon;
use App\Enums\RoomStatus;
use App\Enums\BookingStatus;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.index', ['bookings' => Booking::all(), ]);
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $room = Room::with('roomType')->findOrFail($request->input('room_id'));

        $checkIn = Carbon::parse($request['check_in']);
        $checkOut = Carbon::parse($request['check_out']);
        $nights = $checkIn->diffInDays($checkOut);

        $totalPrice = $room->roomType->price_per_night * $nights;

        $booking = new Booking($request->only(['check_in', 'check_out', 'guests_count', 'comment', 'room_id']));
        $booking->user_id = $request->input('user_id');
        $booking->total_price = $totalPrice;
        $booking->status = BookingStatus::confirmed;

        $booking->save();

        return response()->json($booking, 201);
    }

    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.show', ['booking' => $booking, ]);
    }

    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);

        return view('bookings.edit', [
            'booking' => $booking,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['check_in', 'check_out', 'guests_count', 'comment', 'room_id']));
        return response()->json($booking, 200);
    }

    public function destroy(string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->json($booking, 200);
    }
}
