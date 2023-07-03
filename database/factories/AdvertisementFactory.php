<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->word(),
            'brand' => $this->faker->randomElement([
                'Audi', 'BMW', 'Citroen'
            ]),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(20000, 60000),
            'kilometer' => $this->faker->numberBetween(),
            'license_plate' => $this->faker->word(),
            'build_year' => $this->faker->year(),
            'fuel' => $this->faker->randomElement([
                'Benzine', 'Diesel', 'Elektrisch'
            ]),
            'transmission' => $this->faker->randomElement([
                'Automaat', 'Handgeschakeld'
            ]),
            'color' => $this->faker->colorName(),
            'power' => $this->faker->randomElement([
                '150 PK (110 kW)', '267 PK (196 kW)', '131 PK (96 kW)'
            ]),
            'btw' => $this->faker->boolean(),
            'doors' => $this->faker->randomNumber([
                4, 2
            ]),
            'seating' => $this->faker->randomNumber(),
            'apk_expire_date' => $this->faker->date(),
            'fuel_usage' => $this->faker->randomElement([
                '5.2 l/100km', '5.0 l/100km', '5.3 l/100km'
            ]),
            'cylinder_capacity' => $this->faker->numberBetween(1900, 2000) . 'cc',
            'weight' => $this->faker->numberBetween(1300, 2000)
        ];
    }
}
