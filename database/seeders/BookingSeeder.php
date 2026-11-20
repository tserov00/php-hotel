<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\Room;
use App\Models\User;
use App\Enums\BookingStatus;
use App\Enums\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $bookings = [
            [
                'email' => 'anna@example.com',
                'room_number' => '101',
                'check_in' => '2030-05-01',
                'check_out' => '2030-05-03',
                'guests_count' => 1,
                'method' => PaymentMethod::card,
                'comment' => 'Тестовое бронирование 1',
            ],
            [
                'email' => 'boris@example.com',
                'room_number' => '211',
                'check_in' => '2030-05-10',
                'check_out' => '2030-05-13',
                'guests_count' => 2,
                'method' => PaymentMethod::cash,
                'comment' => 'Тестовое бронирование 2',
            ],
            [
                'email' => 'vera@example.com',
                'room_number' => '421',
                'check_in' => '2030-05-20',
                'check_out' => '2030-05-22',
                'guests_count' => 3,
                'method' => PaymentMethod::card,
                'comment' => 'Тестовое бронирование 3',
            ],
        ];

        foreach ($bookings as $bookingData) {
            $user = User::where('email', $bookingData['email'])->firstOrFail();
            $room = Room::with('roomType')
                ->where('number', $bookingData['room_number'])
                ->firstOrFail();

            $checkIn = Carbon::parse($bookingData['check_in']);
            $checkOut = Carbon::parse($bookingData['check_out']);
            $nights = $checkIn->diffInDays($checkOut);

            $booking = Booking::query()
                ->where('user_id', $user->id)
                ->where('room_id', $room->id)
                ->whereDate('check_in', $bookingData['check_in'])
                ->first() ?? new Booking();

            $totalPrice = $room->roomType->price_per_night * $nights;
            $payment = $booking->payment_id
                ? Payment::find($booking->payment_id)
                : null;
            $payment ??= new Payment();
            $payment->amount = $totalPrice;
            $payment->method = $bookingData['method'];
            $payment->save();

            $booking->user_id = $user->id;
            $booking->room_id = $room->id;
            $booking->payment_id = $payment->id;
            $booking->check_in = $bookingData['check_in'];
            $booking->check_out = $bookingData['check_out'];
            $booking->guests_count = $bookingData['guests_count'];
            $booking->total_price = $totalPrice;
            $booking->status = BookingStatus::confirmed;
            $booking->comment = $bookingData['comment'];
            $booking->save();
        }
    }
}
