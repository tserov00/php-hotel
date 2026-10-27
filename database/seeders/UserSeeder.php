<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            ['name' => 'Анна Иванова', 'email' => 'anna@example.com', 'phone' => '+70000000001'],
            ['name' => 'Борис Петров', 'email' => 'boris@example.com', 'phone' => '+70000000002'],
            ['name' => 'Вера Смирнова', 'email' => 'vera@example.com', 'phone' => '+70000000003'],
            ['name' => 'Глеб Соколов', 'email' => 'gleb@example.com', 'phone' => '+70000000004'],
            ['name' => 'Дарья Кузнецова', 'email' => 'darya@example.com', 'phone' => '+70000000005'],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'phone' => $userData['phone'],
                    'password' => 'password',
                ]
            );
        }
    }
}
