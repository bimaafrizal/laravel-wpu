<?php

namespace Database\Factories;
// require_once 'vendor/autoload.php';
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post_Model>
 */
class Post_ModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2, 10)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 100)))->map(fn ($p) =>
            "<p>$p</p>")->implode(' '),
            // 'body' => '<p>'. implode('<p>/<p>', $this->faker->paragraphs(mt_rand(10, 100))) .'</p>' ,
            'user_id' => mt_rand(1, 5),
            'category_id' => mt_rand(1, 2)
        ];
    }
}
