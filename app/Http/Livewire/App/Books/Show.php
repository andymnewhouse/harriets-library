<?php

namespace App\Http\Livewire\App\Books;

use App\Models\Book;
use Livewire\Component;

class Show extends Component
{
    public Book $book;

    public function mount()
    {
        $this->book->load('authors:id,name', 'categories:id,name');
    }

    public function render()
    {
        return view('livewire.app.books.show')
            ->with([
                'queue' => $this->queue,
            ]);
    }

    // Properties

    public function getQueueProperty()
    {
        if(auth()->check()) {
            return auth()->user()->queue->pluck('id');
        }

        return collect([]);
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

    public function removeFromQueue($id)
    {
        if(auth()->guest()) {
            // notify need to be logged in first
        } else {
            auth()->user()->removeFromQueue($id);
            // notify that book was added to queue
        }
    }
}
