<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gym;

class GymSeeder extends Seeder
{
    public function run()
    {
        Gym::insert([
            [
                'name' => 'Iron Gym',
                'address' => '123 Main St, Your City',
                'latitude' => 23.7725, // Replace with your latitude
                'longitude' => 90.4253, // Replace with your longitude
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
