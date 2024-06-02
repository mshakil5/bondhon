<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // use HasProfilePhoto;
    // use HasTeams;
    // use TwoFactorAuthenticatable;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'sur_name',
        'is_type',
        'password',
        'clientid',
        'street_name',
        'house_number',
        'town',
        'postcode',
        'phone',
        'vat_number',
        'r_name',
        'r_position',
        'r_phone',
        'r_photo',
        'r_address',
        'bank_statement',
        'photo',
        'account_sortcode',
        'account_number',
        'account_name',
        'balance',
        'status',
        'about',
        'facebook',
        'twitter',
        'google',
        'linkedin',
        'google_id',
        'facebook_id',
        'updated_by',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->hasMany(Campaign::class);
    }

    public function campaignshare()
    {
        return $this->hasMany(CampaignShare::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function eventticket()
    {
        return $this->hasMany(TicketSale::class);
    }

    public function charityimage()
    {
        return $this->hasMany(CharityImage::class);
    }

    
}
