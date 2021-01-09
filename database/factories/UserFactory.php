<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'image'=> 'avatar.png',
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$6hpsrl0yvOtVJ.d6jAiLZ.KRSEfA0GeBtV2f2SfXUVS/hrrpJko/q', // password
            'First_name' => $this->faker->firstName,
            'Last_name' => $this->faker->lastName,
            'Address' => $this->faker->address,
            'City' => $this->faker->city,
            'Country' => $this->faker->country,
            'Postal_code' => $this->faker->numberBetween($min = 10000, $max = 100000),
            'About_Me' => $this->faker->text,
            'remember_token' => Str::random(10),
        ];
    }
}