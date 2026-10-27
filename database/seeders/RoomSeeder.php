<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $roomsByType = [
            'Эконом — 1 место' => ['101'],
            'Эконом — 2 места' => ['201'],
            'Эконом — 4 места' => ['401'],
            'Стандарт — 1 место' => ['111'],
            'Стандарт — 2 места' => ['211'],
            'Стандарт — 4 места' => ['411'],
            'Люкс — 1 место' => ['121'],
            'Люкс — 2 места' => ['221'],
            'Люкс — 4 места' => ['421'],
        ];

        foreach ($roomsByType as $typeName => $roomNumbers) {
            $roomType = RoomType::where('name', $typeName)->firstOrFail();

            foreach ($roomNumbers as $index => $number) {
                Room::updateOrCreate(
                    ['number' => $number],
                    [
                        'room_type_id' => $roomType->id,
                        'floor' => $index + 1,
                    ]
                );
            }
        }
    }
}
