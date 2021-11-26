<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebConfigFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->colorName(),
            'key' => Str::random(10),
            'secret' => Str::random(length: 32),
            'enable_client_messages' => $this->faker->boolean,
            'enable_statistics' => $this->faker->boolean,
        ];
    }
}
