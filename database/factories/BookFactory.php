<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'isbn' => $this->faker->unique()->isbn13,
            'year' => $this->faker->year,
            // 'cover_image' => $this->faker->imageUrl(640, 480, 'books', true),
            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
