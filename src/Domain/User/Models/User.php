<?php

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Coupon\Models;

class User extends Model
{
    protected $fillable = [];

    protected $casts = [];

    public function coupons()
    {
        return $this->belongsToMany(Coupon::class);
    }
}
