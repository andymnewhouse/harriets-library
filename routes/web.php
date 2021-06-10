<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/discover', App\Http\Livewire\App\Discover::class)->name('app.discover');
Route::get('/queue', App\Http\Livewire\App\Queue::class)->name('app.queue');

require __DIR__.'/auth.php';
