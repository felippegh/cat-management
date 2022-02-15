<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cat>
 */
class CatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'    => fn() => $this->faker->name(),
            'breed'    => fn() => $this->faker->colorName(),
            'description' => fn() => $this->faker->text(140),
            'location_lat' => fn() => $this->faker->latitude(0,1280),
            'location_lon' => fn() => $this->faker->longitude(0,800),
            'birthdate'    => fn() => $this->faker->date(),
        ];
    }
}
