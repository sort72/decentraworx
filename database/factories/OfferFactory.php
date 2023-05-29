<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => 2,
            'status' => 1,
            'name' => $this->faker->jobTitle,
            'area' => $this->faker->jobTitle,
            'knowledge' => $this->faker->text,
            'details' => $this->faker->text,
            'contract_type' => $this->faker->numberBetween(0, 2),
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date' => $this->faker->dateTimeThisYear(),
            'payment_type' => $this->faker->numberBetween(0, 2),
            'amount' => $this->faker->numberBetween(100, 4000) * 1000,
            'location' => $this->faker->address,
        ];
    }
}
