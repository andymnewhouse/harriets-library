<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('book_category', function (Blueprint $table) {
            $table->unsignedBigInteger('book_id')->index();
            $table->unsignedBigInteger('category_id')->index();

            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

            $table->primary(['book_id', 'category_id']);
        });
    }
}
