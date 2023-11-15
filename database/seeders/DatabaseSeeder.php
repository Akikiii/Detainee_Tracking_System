<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    \App\Models\User::factory(10)->create();
    // \App\Models\Detainee::factory(10)->create();
    // \App\Models\DetaineeDetails::factory(10)->create();
}
}
