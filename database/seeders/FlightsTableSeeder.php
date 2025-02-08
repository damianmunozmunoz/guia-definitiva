<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    //Aquí se hacen los inserts correspondientes a las tablas
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        DB::table('flight')->insert([

        ]);
    }
}
