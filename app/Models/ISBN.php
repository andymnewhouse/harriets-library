<?php

namespace App\Models;

use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class ISBN extends Model
{
    use Sushi;

    public function getRows()
    {
        return Http::get('https://api.sheety.co/7824f75889dc7b613a640d3f2b28a047/toImport/isbn')['isbn'];;
    }
}
