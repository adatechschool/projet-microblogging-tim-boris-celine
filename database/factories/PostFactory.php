<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title"=> $this->faker->text(100),
            "content"=> $this->faker->text(255),
            "image"=> "https://m1.quebecormedia.com/emp/emp/Capture_d_e_cran_le_2020_11_03_a_10.01.22c71ef3cd-887a-4f5e-a61c-2d865768dd1c_ORIGINAL.jpg?impolicy=crop-resize&x=0&y=0&w=946&h=996&width=925",
            "user_id"=> User::all()->random()->id
        ];
    }
}
