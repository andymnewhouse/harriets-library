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
        'meta' => SchemalessAttributes::class,
    ];


    // Scopes
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
        $data = Http::get("https://www.googleapis.com/books/v1/volumes?q=isbn:{$isbn}")->json();

        throw_if(!isset($data['totalItems']) || $data['totalItems'] === 0, new NotFoundResourceException);

        $apiData = $data['items'][0];
        $bookData = $apiData['volumeInfo'];

        $book = self::create([
            'api_id' => $apiData['id'],
            'title' => isset($bookData['subtitle']) ? "{$bookData['title']}: {$bookData['subtitle']}" : $bookData['title'],
            'short_description' => $apiData['searchInfo']['textSnippet'] ?? '',
            'description' => $bookData['description'] ?? '',
            'meta' => Arr::only($bookData, ['publishedDate', 'pageCount', 'maturityRating', 'imageLinks']),
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
