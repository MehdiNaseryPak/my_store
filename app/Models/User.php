<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,HasApiTokens, Notifiable , Sluggable;
    public function sluggable(): array
    {
        return ['slug' => ['source' => 'first_name']];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'national_code',
        'slug',
        'profile_photo_path',
        'email_verified_at',
        'activation',
        'activation_date',
        'user_type',
        'status',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function otp()
    {
        return $this->hasOne(Otp::class)->latestOfMany();
    }

    public function hasValidOtp()
    {
        if($this->otp && Carbon::now()->lessThan($this->otp->expire_at))
            return true;
        return false;
    }

    public function fullName()
    {
        return $this->firstname .' '. $this->lastname;
    }
}
