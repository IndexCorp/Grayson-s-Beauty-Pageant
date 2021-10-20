<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
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
        $title = $this->faker->paragraph(1);
        return [
            'unique_id' =>  Str::uuid(),
            'category_id'   => 1,
            'title'     => $title,
            'slug'      => Str::slug($title),
            'heading'   => $this->faker->paragraph(2),
            'image'     => 'image',
            'body'      =>  $this->faker->paragraph(30),
        ];
    }
}
