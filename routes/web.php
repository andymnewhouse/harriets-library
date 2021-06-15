<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discover', App\Http\Livewire\App\Discover::class)->name('app.discover');
Route::get('/queue', App\Http\Livewire\App\Queue::class)->name('app.queue');
Route::get('/books/{book:isbn}', App\Http\Livewire\App\Books\Show::class)->name('app.books.show');

require __DIR__.'/auth.php';
