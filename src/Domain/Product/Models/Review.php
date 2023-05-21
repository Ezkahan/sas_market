<?php

namespace Domain\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\User\Models\User;

class Review extends Model
{
    protected $fillable = [
        'comment',
        'product_id',
        'user_id',
        'confirmed',
    ];

    protected $casts = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isConfirmed()
    {
        return $this->confirmed ? true : false;
    }
}
