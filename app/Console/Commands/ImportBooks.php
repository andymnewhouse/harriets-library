<?php

namespace App\Console\Commands;

use App\Models\Book;
use App\Models\ISBN;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

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
        foreach(ISBN::all()->pluck('isbn') as $isbn) {
            try {
                Book::createFromIsbn($isbn);
                echo "Found: {$isbn} \n";
            } catch(NotFoundResourceException $e) {
                echo "Not found: {$isbn} \n";
                continue;
            }
        }
    }
}
