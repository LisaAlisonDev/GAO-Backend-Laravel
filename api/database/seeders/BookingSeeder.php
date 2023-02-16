<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for ($i = 0 ; $i < 3; $i++) {
            DB::table('bookings')->insert([
                'hour' => rand(0, 15),
                'computer_id' => $i,
                'user_id' => 1,
                'date' => new \DateTime()
            ]);
        }
    }
}
