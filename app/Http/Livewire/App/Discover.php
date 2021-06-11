<?php

namespace App\Http\Livewire\App;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination;

class Discover extends Component
{
    use WithPagination;

    public $filters = [
        'authors' => [],
        'categories' => [],
        'sortBy' => 'title--asc',
        'search' => '',
        'perPage' => 12,
    ];

    public function updated($field)
    {
        if(Str::startsWith('filters', $field)) {
            $this->resetPage();
        }
    }

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
        return Author::all()->sortBy('name');
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
            ->paginate($this->filters['perPage']);
    }

    public function getCategoriesProperty()
    {
        return Category::all()->sortBy('name');
    }

    // Methods

    public function addToQueue($id)
    {
        if(auth()->guest()) {
            // notify need to be logged in first
        } else {
            auth()->user()->addToQueue($id);
            // notify that book was added to queue
        }
    }
}
