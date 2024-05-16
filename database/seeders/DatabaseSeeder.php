<?php

namespace Database\Seeders;

use App\Models\Rooms;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $rooms = [
            [
                'room_number' => 1,
                'person_capacity' => 2
            ],
            [
                'room_number' => 2,
                'person_capacity' => 2
            ],
            [
                'room_number' => 3,
                'person_capacity' => 4
            ],
            [
                'room_number' => 4,
                'person_capacity' => 6
            ],
            [
                'room_number' => 5,
                'person_capacity' => 8
            ]
        ];

        foreach($rooms as $room){
            Rooms::create($room);
        }
    }
}
