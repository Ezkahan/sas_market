<?php

namespace Domain\Cart\Models;

use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'user_id',
        'address',
        'note',
        'pay_type',
        'status',
    ];

    protected $casts = [];

    public function products(): HasMany
    {
        return $this->hasMany(CartProduct::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
