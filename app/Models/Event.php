<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function eventprice()
    {
        return $this->hasMany(EventPrice::class);
    }

    public function eventimage()
    {
        return $this->hasMany(EventImage::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventticket()
    {
        return $this->hasMany(TicketSale::class);
    }
}
