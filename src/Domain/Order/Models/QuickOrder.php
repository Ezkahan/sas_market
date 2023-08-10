<?php

namespace Domain\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuickOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'note',
        'delivery_type',
        'pay_type',
    ];

    public function quickOrderProducts(): HasMany
    {
        return $this->hasMany(QuickOrderProduct::class);
    }
}
