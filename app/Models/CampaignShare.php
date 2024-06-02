<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignShare extends Model
{
    use HasFactory;

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
