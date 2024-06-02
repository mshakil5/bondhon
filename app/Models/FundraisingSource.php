<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundraisingSource extends Model
{
    use HasFactory;

    public function fundraise()
    {
        return $this->hasMany(FundRaise::class);
    }
}
