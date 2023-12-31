<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Category;

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
        $title = $this->faker->unique->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'extract' => $this->faker->text(200),
            'description' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2]),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
