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
            $this->emit('notify', ['message' => 'Please login before trying to add books to your queue.', 'type' => 'error']);
        } else {
            auth()->user()->addToQueue($id);
            $this->emit('notify', ['message' => 'Successfully added book to queue.', 'type' => 'success']);
        }
    }

    public function removeFromQueue($id)
    {
        if(auth()->guest()) {
            $this->emit('notify', ['message' => 'Please login before trying to remove books from your queue.', 'type' => 'error']);
        } else {
            auth()->user()->removeFromQueue($id);
            $this->emit('notify', ['message' => 'Successfully removed book from queue.', 'type' => 'success']);
        }
    }
}
