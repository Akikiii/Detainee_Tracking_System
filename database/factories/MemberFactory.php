<?php
namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // Change 'password' to your desired default password
            'remember_token' => Str::random(10),
            'office_address' => $this->faker->address,
            'contact_number' => $this->faker->phoneNumber,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'education_qualifications' => $this->faker->sentence,
            'practice_areas' => $this->faker->words(3, true),
            'work_experience' => $this->faker->paragraph,
            'professional_affiliations' => $this->faker->sentence,
            'cases_handled' => $this->faker->paragraph,
            'language_spoken' => $this->faker->languageCode,
            'office_hours_open' => $this->faker->time('H:i:s'),
            'office_hours_close' => $this->faker->time('H:i:s'),
        ];
    }
}
