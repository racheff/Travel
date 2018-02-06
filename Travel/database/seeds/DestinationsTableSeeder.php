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
            'image' => 'zimbabwe.jpg',
            'description' => 'Journey to Zimbabwe',
            'price' => 250
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '2',
            'name' => 'East Island Exscursion',
            'country' => 'North America',
            'duration' => '2 days',
            'image' => 'East_island_tours.jpg',
            'description' => 'Best Vacation',
            'price' => 500
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '3',
            'name' => 'Rio de Janeiro',
            'country' => 'Brazil',
            'duration' => '1 day',
            'image' => 'Brazil_tours.jpg',
            'description' => 'You must see it !',
            'price' => 300
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '4',
            'name' => 'Vai Palm Forest',
            'country' => 'Europe',
            'duration' => '6 days',
            'image' => 'Vai_palm_forest.jpg',
            'description' => 'Island Crete is waiting for you',
            'price' => 222.5
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '3',
            'name' => 'Kayak Holidays',
            'country' => 'Europe',
            'duration' => '3 days',
            'image' => 'kayak-holidays.jpg',
            'description' => 'Will stop your breath',
            'price' => 199.99
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '2',
            'name' => 'Costa Rica volcano',
            'country' => 'North America',
            'duration' => '1 day',
            'image' => 'Costa-Rica.jpg',
            'description' => 'The great view of volcano',
            'price' => 700
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '1',
            'name' => 'Eiffel Tower',
            'country' => 'France, Paris',
            'duration' => '2 days',
            'image' => 'eiffel-tower-paris.jpg',
            'description' => 'The Eiffel Tower is a wrought iron lattice tower on the Champ de Mars in Paris, France. It is named after the engineer Gustave Eiffel, whose company designed and built the tower.  Constructed from 1887–89 as the entrance to the 1889 World\'s Fair, it was initially criticized by some of France\'s leading artists and intellectuals for its design, but it has become a global cultural icon of France and one of the most recognisable structures in the world.[3] The Eiffel Tower is the most-visited paid monument in the world; 6.91 million people ascended it in 2015.  The tower is 324 metres (1,063 ft) tall, about the same height as an 81-storey building, and the tallest structure in Paris. Its base is square, measuring 125 metres (410 ft) on each side. During its construction, the Eiffel Tower surpassed the Washington Monument to become the tallest man-made structure in the world, a title it held for 41 years until the Chrysler Building in New York City was finished in 1930. Due to the addition of a broadcasting aerial at the top of the tower in 1957, it is now taller than the Chrysler Building by 5.2 metres (17 ft). Excluding transmitters, the Eiffel Tower is the second-tallest structure in France after the Millau Viaduct.  The tower has three levels for visitors, with restaurants on the first and second levels. The top level\'s upper platform is 276 m (906 ft) above the ground – the highest observation deck accessible to the public in the European Union. Tickets can be purchased to ascend by stairs or lift (elevator) to the first and second levels. The climb from ground level to the first level is over 300 steps, as is the climb from the first level to the second. Although there is a staircase to the top level, it is usually accessible only by lift.',
            'price' => 99.9
        ]);
        DB::table('Destinations')->insert([
            'agent_id' => '1',
            'name' => 'India temple',
            'country' => 'India',
            'duration' => '8 days',
            'image' => 'temple-india.jpg',
            'description' => '8 days pleasure in temple',
            'price' => 125
        ]);
    }
}
