<?php

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DetaineeDetail;

class DetaineeDetailFactory extends Factory
{
    protected $model = DetaineeDetail::class;

    public function definition()
    {
        return [
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'mother_name' => $this->faker->name('female'),
            'father_name' => $this->faker->name('male'),
            'spouse_name' => $this->faker->name,
            'related_photos' => $this->faker->imageUrl(),
            'crime_history' => $this->faker->paragraph,
            'max_detention_period' => $this->faker->randomNumber(2),
            'detention_begin' => $this->faker->date,
            'medical_information' => $this->faker->paragraph,
            'emergency_contact_number' => $this->faker->phoneNumber,
            'emergency_contact_name' => $this->faker->name,
        ];
    }
}
