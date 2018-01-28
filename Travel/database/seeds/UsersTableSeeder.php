<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('Users')->insert([
            'name' => 'Admin',
            'email' => 'admin@travelagency.com',
            'password' => bcrypt('admin'),
            'admin' => boolval(true)
        ]);
        DB::table('Users')->insert([
            'name' => 'User',
            'email' => 'user@travelagency.com',
            'password' => bcrypt('user'),
            'admin' => boolval(false)
        ]);
    }
}
