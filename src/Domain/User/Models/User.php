<?php

namespace Domain\User\Models;

use Domain\Cart\Models\Cart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'photo_path',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function cart(): BelongsTo
    {
        return $this->belongsTo(Cart::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(UserAddress::class);
    }

    public function getPhotoAttribute()
    {
        $path = '/assets/images/users/';
        $photo = $this->photo_path;

        if (is_file(public_path() . $path . $photo)) {
            return url('/') . $path . $photo;
        }

        return url('/') . '/assets/icons/user.png';
    }

    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
}
