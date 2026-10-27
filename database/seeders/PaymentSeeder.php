<?php

namespace Database\Seeders;

use App\Enums\PaymentMethod;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    public function run(): void
    {
        $payments = [
            ['check_in' => '2030-05-01', 'method' => PaymentMethod::card],
            ['check_in' => '2030-05-10', 'method' => PaymentMethod::cash],
            ['check_in' => '2030-05-20', 'method' => PaymentMethod::card],
        ];

        foreach ($payments as $paymentData) {
            $booking = Booking::whereDate('check_in', $paymentData['check_in'])->firstOrFail();

            Payment::updateOrCreate(
                ['booking_id' => $booking->id],
                [
                    'amount' => $booking->total_price,
                    'method' => $paymentData['method'],
                ]
            );
        }
    }
}
