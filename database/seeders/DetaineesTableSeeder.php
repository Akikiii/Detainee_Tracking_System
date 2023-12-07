<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Detainee;

class DetaineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can adjust the number of detainees you want to seed
        $numberOfDetainees = 10;

        // Use the factory to create detainees and detainee details
        Detainee::factory($numberOfDetainees)->create();
    }
}
