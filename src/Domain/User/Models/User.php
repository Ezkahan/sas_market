<?php

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'phone',
        'password',
        'email_verified_at',
        'phone_verified_at',
        'birth_day',
        'photo',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->password = Hash::make($user->password);
        });
    }

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }

    public function getPhoto()
    {
        $path = '/assets/images/users/';
        $photo = $this->photo;

        if (is_file(public_path() . $path . $photo)) {
            return url('/') . $path . $photo;
        }

        return url('/') . '/assets/images/defaults/user.webp';
    }
}
