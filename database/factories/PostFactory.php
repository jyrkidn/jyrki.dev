<?php

namespace Database\Factories;

use App\Enums\PostType;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'type' => collect(PostType::cases())->random()->value,
            'redirect_url' => $this->faker->url,
            'intro' => $this->faker->text,
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->dateTime(),
            'slug' => $this->faker->slug,
            'is_online' => $this->faker->boolean,
        ];
    }
}
