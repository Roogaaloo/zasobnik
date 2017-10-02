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
        DB::table('users')->insert([
            'name' => 'Robert Galovič',
            'email' => 'robert.galovic@4g.cz',
            'password' => bcrypt('spermobanka'),
        ]);
    }
}
