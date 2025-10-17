<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelRequestSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('travel_requests')->insert([
            [
                'user_id' => 1,
                'destination' => 'Paris, France',
                'departure_date' => '2025-12-01',
                'return_date' => '2025-12-10',
                'status' => 'pending',
            ],
            [
                'user_id' => 1,
                'destination' => 'Tokyo, Japan',
                'departure_date' => '2025-01-15',
                'return_date' => '2025-01-25',
                'status' => 'approved',
            ],
            [
                'user_id' => 2,
                'destination' => 'Minas Gerais, Brazil',
                'departure_date' => '2025-05-15',
                'return_date' => '2025-07-25',
                'status' => 'approved',
            ],
            [
                'user_id' => 2,
                'destination' => 'New York, USA',
                'departure_date' => '2024-02-05',
                'return_date' => '2024-02-15',
                'status' => 'rejected',
            ],
            [
                'user_id' => 3,
                'destination' => 'Sydney, Australia',
                'departure_date' => '2024-03-10',
                'return_date' => '2024-03-20',
                'status' => 'cancelled',
            ],
            [
                'user_id' => 3,
                'destination' => 'São Paulo, Brazil',
                'departure_date' => '2026-01-10',
                'return_date' => '2026-01-20',
                'status' => 'approved',
            ],
        ]);
    }
}
