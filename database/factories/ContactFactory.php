<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement([__('Phone number'), __('Email')]),
            'body' => $this->faker->randomElement([
                $this->faker->phoneNumber(),
                $this->faker->email()
            ])
        ];
    }
}
