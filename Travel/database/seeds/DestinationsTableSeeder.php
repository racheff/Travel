<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DestinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Destinations')->insert([
            'agent_id' => '1',
            'name' => 'Zimbabwe',
            'country' => 'Africa',
            'duration' => '3 days',
            'image' => 'http://localhost/images/destinations/zimbabwe.jpg',
            'description' => 'Journey to Zimbabwe',
            'price' => 250
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '2',
            'name' => 'East Island Exscursion',
            'country' => 'North America',
            'duration' => '2 days',
            'image' => 'http://localhost/images/destinations/East_island_tours.jpg',
            'description' => 'Best Vacation',
            'price' => 500
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '3',
            'name' => 'Rio de Janeiro',
            'country' => 'Brazil',
            'duration' => '1 day',
            'image' => 'http://localhost/images/destinations/Brazil_tours.jpg',
            'description' => 'You must see it !',
            'price' => 300
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '4',
            'name' => 'Vai Palm Forest',
            'country' => 'Europe',
            'duration' => '6 day',
            'image' => 'http://localhost/images/destinations/Vai_palm_forest.jpg',
            'description' => 'Island Crete is waiting for you',
            'price' => 222.5
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '3',
            'name' => 'Kayak Holidays',
            'country' => 'Europe',
            'duration' => 'not set',
            'image' => 'http://localhost/images/destinations/kayak-holidays.jpg',
            'description' => 'Will stop your breath',
            'price' => 199.99
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '2',
            'name' => 'Costa Rica volcano',
            'country' => 'North America',
            'duration' => '1 day',
            'image' => 'http://localhost/images/destinations/Costa-Rica.jpg',
            'description' => 'The great view of volcano',
            'price' => 700
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '1',
            'name' => 'Eiffel Tower',
            'country' => 'France, Paris',
            'duration' => '2 days',
            'image' => 'http://localhost/images/destinations/eiffel-tower-paris.jpg',
            'description' => 'If you didn\'t check it , you have to!',
            'price' => 99.9
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '1',
            'name' => 'India temple',
            'country' => 'India',
            'duration' => '8 days',
            'image' => 'http://localhost/images/destinations/temple-india.jpg',
            'description' => '8 days pleasure in temple',
            'price' => 125
        ]);
    }
}
