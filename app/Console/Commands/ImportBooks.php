<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\ISBN;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ImportBooks extends Command
{
    protected $signature = 'books:import';

    protected $description = 'Import books into the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $data = Http::get('https://www.googleapis.com/books/v1/volumes?q=isbn:9781491936085')->json();

        if($data['totalItems'] > 0) {
            $bookData = $data['items'][0];

            $book = Book::createFromApi($bookData);
        }

    }
}
