<?php

namespace Domain\User\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'address',
        'active',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
