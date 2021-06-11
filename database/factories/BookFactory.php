<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'api_id' => 'ABC123',
            'title' => 'Laravel: Up and Running',
        ];
    }
}
