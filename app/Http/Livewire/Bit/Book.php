<?php

namespace App\Http\Livewire\Bit;

use App\Models\Book as BookModel;
use Livewire\Component;

class Book extends Component
{
    public BookModel $book;

    public function render()
    {
        return view('livewire.bit.book');
    }
}
