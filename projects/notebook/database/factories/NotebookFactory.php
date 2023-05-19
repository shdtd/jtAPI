<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NotebookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname'  => fake()->firstName() . " " . fake()->lastName(),
            'company'   => (bool)rand(0,1) ? fake()->company() : '',
            'phone'     => fake()->phoneNumber(),
            'mail'      => fake()->email(),
            'birthdate' => (bool)rand(0,1) ? fake()
                                ->dateTimeBetween('1970-01-01', '2000-12-31')
                                ->format('d/m/Y') : ''
        ];
    }
}
