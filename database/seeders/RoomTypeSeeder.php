<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    public function run(): void
    {
        $roomTypes = [
            [
                'name' => 'Эконом — 1 место',
                'description' => 'Эконом-комната для одного гостя.',
                'capacity' => 1,
                'price_per_night' => 80,
            ],
            [
                'name' => 'Эконом — 2 места',
                'description' => 'Эконом-комната для двух гостей.',
                'capacity' => 2,
                'price_per_night' => 100,
            ],
            [
                'name' => 'Эконом — 4 места',
                'description' => 'Эконом-комната для семьи до четырёх гостей.',
                'capacity' => 4,
                'price_per_night' => 140,
            ],
            [
                'name' => 'Стандарт — 1 место',
                'description' => 'Стандартная комната для одного гостя.',
                'capacity' => 1,
                'price_per_night' => 120,
            ],
            [
                'name' => 'Стандарт — 2 места',
                'description' => 'Стандартная комната для двух гостей.',
                'capacity' => 2,
                'price_per_night' => 150,
            ],
            [
                'name' => 'Стандарт — 4 места',
                'description' => 'Стандартная комната для семьи до четырёх гостей.',
                'capacity' => 4,
                'price_per_night' => 200,
            ],
            [
                'name' => 'Люкс — 1 место',
                'description' => 'Комната люкс для одного гостя.',
                'capacity' => 1,
                'price_per_night' => 200,
            ],
            [
                'name' => 'Люкс — 2 места',
                'description' => 'Комната люкс для двух гостей.',
                'capacity' => 2,
                'price_per_night' => 250,
            ],
            [
                'name' => 'Люкс — 4 места',
                'description' => 'Просторная комната люкс для семьи до четырёх гостей.',
                'capacity' => 4,
                'price_per_night' => 350,
            ],
        ];

        foreach ($roomTypes as $roomTypeData) {
            RoomType::updateOrCreate(
                ['name' => $roomTypeData['name']],
                [
                    'description' => $roomTypeData['description'],
                    'capacity' => $roomTypeData['capacity'],
                    'price_per_night' => $roomTypeData['price_per_night'],
                ]
            );
        }
    }
}
