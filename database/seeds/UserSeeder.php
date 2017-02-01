<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'email' 				=>	'ricardofa1980@gmail.com',
        	'password' => bcrypt('animex'),
        	'type'	=>	'admin',
        	'medico_id' => 1,
        ]);
    }
}
