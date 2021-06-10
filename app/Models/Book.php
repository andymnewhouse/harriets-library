<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Book extends Model
{
    use HasFactory;

    public $casts = [
        'settings' => SchemalessAttributes::class,
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->settings->modelCast();
    }
}
