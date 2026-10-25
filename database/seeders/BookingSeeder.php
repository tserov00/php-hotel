<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => 'password']
        );

        $roomType = RoomType::firstOrCreate(
            ['name' => 'Test room type'],
            [
                'description' => 'Для проверки формы',
                'capacity' => 2,
                'price_per_night' => 100,
            ]
        );

        $room = Room::firstOrCreate(
            ['number' => 'TEST-101'],
            [
                'room_type_id' => $roomType->id,
                'floor' => 1,
            ]
        );

        $bookings = [
            [
                'check_in' => '2030-01-10',
                'check_out' => '2030-01-12',
                'guests_count' => 2,
                'comment' => 'Тестовое бронирование 1',
            ],
            [
                'check_in' => '2030-01-15',
                'check_out' => '2030-01-17',
                'guests_count' => 1,
                'comment' => 'Тестовое бронирование 2',
            ],
            [
                'check_in' => '2030-01-20',
                'check_out' => '2030-01-22',
                'guests_count' => 2,
                'comment' => 'Тестовое бронирование 3',
            ],
            [
                'check_in' => '2030-01-25',
                'check_out' => '2030-01-27',
                'guests_count' => 1,
                'comment' => 'Тестовое бронирование 4',
            ],
            [
                'check_in' => '2030-01-30',
                'check_out' => '2030-02-01',
                'guests_count' => 2,
                'comment' => 'Тестовое бронирование 5',
            ],
        ];

        foreach ($bookings as $bookingData) {
            Booking::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'room_id' => $room->id,
                    'check_in' => $bookingData['check_in'],
                ],
                [
                    'check_out' => $bookingData['check_out'],
                    'guests_count' => $bookingData['guests_count'],
                    'total_price' => 200,
                    'status' => 'confirmed',
                    'comment' => $bookingData['comment'],
                ]
            );
        }
    }
}
