<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 2,
            'city' => fake()->city(),
            'district' => fake()->city(),
            'zipcode' => fake()->randomDigitNotZero(),
            'addresses' => fake()->address(),
            'is_default' => fake()->boolean(),
        ];
    }
}
