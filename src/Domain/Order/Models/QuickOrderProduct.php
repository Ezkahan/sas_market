<?php

namespace Domain\Order\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuickOrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'quick_order_id',
        'product_id',
        'quantity',
        'price',
        'discount_price',
    ];

    public function quickOrder(): BelongsTo
    {
        return $this->belongsTo(QuickOrder::class);
    }
}
