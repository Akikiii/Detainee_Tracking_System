<?php

use App\Models\Detainee;
use Illuminate\Database\Eloquent\Factories\Factory; 

class DetaineeFactory extends Factory
{
    protected $model = Detainee::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'middle_name' => $this->faker->firstName,
            'home_address' => $this->faker->address,
            'contact_number' => $this->faker->phoneNumber,
            'email_address' => $this->faker->unique()->safeEmail,
        ];
    }
}

