<?php

namespace Database\Factories;

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
        $file ="1666190917399iphone.jpg";
        return [
            'title' => fake()->name(),
            'price' => "200",
            'quntity' => fake()->randomDigit(),
            'category' => fake()->name(),
            'discount_price' => "199",
            'description' => fake()->text(),
            'img' => "1666190917399iphone.jpg",
        ];
    }
}
