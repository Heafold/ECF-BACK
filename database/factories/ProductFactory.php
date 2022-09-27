<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'=>fake()->sentence(1),
            'description'=>fake()->text(),
            'price'=>fake()->numberBetween(200, 1600),
            'released_at'=>fake()->date(),
            'favorite'=>fake()->boolean(),
            'color_id'=>Color::factory(),
            'cover'=>fake()->imageUrl(),
            'category_id'=> Category::factory(),
        ];
    }
}
