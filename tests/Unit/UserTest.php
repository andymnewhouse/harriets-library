<?php

namespace Tests\Unit;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_book_from_api_data()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $user->addToQueue($book->id);

        $this->assertTrue($user->queue->contains($book->id));
    }
}
