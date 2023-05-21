<?php

namespace Domain\Subscriber\Models;

use Illuminate\Database\Eloquent\Model;
use Domain\Subscriber\Enums\SubscriberTypeEnum;

class Subscriber extends Model
{
    protected $fillable = [
        'comment',
        'product_id',
        'user_id',
        'confirmed',
    ];

    protected $casts = [
        'type' => SubscriberTypeEnum::class,
    ];
}
