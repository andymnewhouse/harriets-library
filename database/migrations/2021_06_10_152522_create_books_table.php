<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->index();
            $table->string('title')->index();
            $table->text('description')->nullable();
            $table->string('cover_url')->index()->nullable();
            $table->string('pages')->index()->nullable();
            $table->schemalessAttributes('grades');
            $table->schemalessAttributes('meta');
            $table->timestamps();
        });
    }
}
