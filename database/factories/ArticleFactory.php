<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $title = $this->faker->sentence(3);

        $para = "
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi dolorem doloremque, voluptatum, ab facere laudantium eum   quo perspiciatis deserunt dolorum iusto quas consequatur fugiat amet porro, a eligendi. Saepe deserunt adipisci architecto iste cum consequuntur dolorum eveniet asperiores laboriosam eaque quasi odit sapiente corporis, reprehenderit aliquid perspiciatis minus delectus. Fugiat eius corporis voluptatibus porro! Nihil, mollitia fugit facere aliquam, quidem nisi similique earum corrupti dignissimos exercitationem cumque quos reprehenderit. Similique fuga obcaecati tenetur, consequuntur fugit voluptatum praesentium porro odit, officiis aspernatur quam quibusdam, saepe temporibus illum asperiores doloremque facere est esse itaque deleniti! Non ut error quisquam modi cumque repellat!";


        return [
            'title' => $title,
            'content' => $para,
            'slug' => Str::slug($title) . uniqid("-"),
            'excerpt' => Str::limit($para, 200),
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5)
        ];
    }
}
