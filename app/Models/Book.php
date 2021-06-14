<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $casts = [
        'grades' => SchemalessAttributes::class,
        'meta' => SchemalessAttributes::class,
    ];


    // Scopes
    public function scopeWithGrades(): Builder
    {
        return $this->grades->modelCast();
    }

    public function scopeWithMeta(): Builder
    {
        return $this->meta->modelCast();
    }


    // Relations

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Attributes

    // Methods

    public static function createFromIsbn($isbn) {
        $googleData = Http::get("https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}")->json();
        $openData = Http::get("https://openlibrary.org/isbn/{$isbn}.json")->json();

        throw_if(!isset($googleData['totalItems']) || $googleData['totalItems'] === 0, new NotFoundResourceException);

        $apiData = $googleData['items'][0];
        $bookData = $apiData['volumeInfo'];

        $coverUrl = $bookData['imageLinks']['thumbnail'] ?? (isset($openData['covers']) ? "https://covers.openlibrary.org/b/id/{$openData['covers'][0]}-L.jpg" : null);

        $book = self::create([
            'isbn' => $isbn,
            'title' => isset($bookData['subtitle']) ? "{$bookData['title']}: {$bookData['subtitle']}" : $bookData['title'],
            'description' => $bookData['description'] ?? '',
            'pages' => $bookData['pageCount'] ?? '',
            'cover_url' => $coverUrl,
            'meta' => ['google' => $apiData, 'openlibrary' => $openData],
        ]);

        // can be optimized?
        if(isset($bookData['authors'])) {
            foreach($bookData['authors'] as $authorName) {
                $authorId = Author::firstOrCreate(['name' => $authorName])->id;
                $book->authors()->attach($authorId);
            }
        }

        if(isset($bookData['categories'])) {
            foreach($bookData['categories'] as $categoryName) {
                $categoryId = Category::firstOrCreate(['name' => $categoryName])->id;
                $book->categories()->attach($categoryId);
            }
        }

        return $book;

    }

}
