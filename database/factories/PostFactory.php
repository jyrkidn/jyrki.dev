<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(4),
            'type' => $this->faker->word,
            'redirect_url' => $this->faker->word,
            'intro' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->dateTime(),
            'slug' => $this->faker->slug,
            'is_online' => $this->faker->boolean,
        ];
    }
}
