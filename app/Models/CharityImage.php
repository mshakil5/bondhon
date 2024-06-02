<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharityImage extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(Event::class);
    }
}
