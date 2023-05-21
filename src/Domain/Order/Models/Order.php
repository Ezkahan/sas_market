<?php

namespace Domain\Order\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Order\Enums\PayTypeEnum;

class Order extends Model
{
    protected $fillable = [
        'comment',
        'product_id',
        'user_id',
        'confirmed',
    ];

    protected $casts = [
        'type' => PayTypeEnum::class,
    ];
}
