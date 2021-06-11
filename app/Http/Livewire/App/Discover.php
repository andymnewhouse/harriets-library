<?php

namespace App\Http\Livewire\App;

use App\Models\Book;
use Livewire\Component;

class Discover extends Component
{
    public $filters = [
        'authors' => [],
        'categories' => [],
        'sortBy' => 'title--asc',
        'search' => '',
    ];

    public function render()
    {
        return view('livewire.app.discover')
            ->with([
                'books' => $this->books,
                'categories' => $this->categories,
                'authors' => $this->authors,
            ]);
    }

    // Properties

    public function getAuthorsProperty()
    {
        return $this->books->flatMap->authors->unique('name')->sortBy('name');
    }

    public function getBooksProperty()
    {
        [$orderByColumn, $orderByDirection] = explode('--', $this->filters['sortBy']);

        return Book::with('authors:id,name', 'categories:id,name')
            ->join('author_book', 'books.id', 'author_book.book_id')
            ->join('book_category', 'books.id', 'book_category.book_id')
            ->when($this->filters['authors'] !== [], function($query) {
                return $query->whereIn('author_book.author_id', $this->filters['authors']);
            })
            ->when($this->filters['categories'] !== [], function($query) {
                return $query->whereIn('book_category.category_id', $this->filters['categories']);
            })
            ->selectRaw('DISTINCT books.id, books.title, books.meta')
            ->orderBy($orderByColumn, $orderByDirection)
            ->get();
    }

    public function getCategoriesProperty()
    {
        return $this->books->flatMap->categories->unique('name')->sortBy('name');
    }

    // Methods
}
