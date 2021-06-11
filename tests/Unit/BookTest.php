<?php

namespace Tests\Unit;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_book_from_api_data()
    {
        $book = Book::createFromISBN('9781491936085');

        $this->assertNotNull($book->api_id);
        $this->assertEquals($book->title, 'Laravel: Up and Running: a Framework for Building Modern Php Apps');
        $this->assertEquals($book->authors()->first()->name, 'Matt Stauffer');
        $this->assertEquals($book->categories()->first()->name, 'Computers');
    }
}
