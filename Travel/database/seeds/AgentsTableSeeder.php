<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Agents')->insert([
            'first_name' => 'Ivan',
            'last_name' => 'Petrov',
            'company' => 'Royal',
        ]);
        DB::table('Agents')->insert([
            'first_name' => 'Kaloyan',
            'last_name' => 'Rachev',
            'company' => 'Racheff',
        ]);
        DB::table('Agents')->insert([
            'first_name' => 'Stoyan',
            'last_name' => 'Mihaylovski',
            'company' => 'Journeys',
        ]);
        DB::table('Agents')->insert([
            'first_name' => 'Petya',
            'last_name' => 'Hristova',
            'company' => 'Best Holidays',
        ]);

    }
}
