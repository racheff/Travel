<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Vehicles')->insert([
            'type' => 'Bus',
            'ticket_price' => 49.9,
        ]);
        DB::table('Vehicles')->insert([
            'type' => 'Plane',
            'ticket_price' => 149.9,
        ]);
        DB::table('Vehicles')->insert([
            'type' => 'Boat',
            'ticket_price' => 111,
        ]);
    }
}
