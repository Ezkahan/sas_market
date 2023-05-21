<?php

namespace Domain\Promotion\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Subscription\Enums\SubscriptionTypeEnum;

class Subscription extends Model
{
    protected $fillable = [
        'comment',
        'product_id',
        'user_id',
        'confirmed',
    ];

    protected $casts = [
        'type' => SubscriptionTypeEnum::class,
    ];
}
