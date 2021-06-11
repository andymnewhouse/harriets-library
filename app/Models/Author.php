<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    public $guarded = [];

    // Relationships

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    // Attributes

    // Methods
}
