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
            $table->string('api_id')->index();
            $table->string('title')->index();
            $table->string('short_description')->index()->nullable();
            $table->text('description')->nullable();
            $table->schemalessAttributes('meta');
            $table->timestamps();
        });
    }
}
