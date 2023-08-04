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

    // Order times
    // [
    //     '09:00' => [
    //         '09:00',
    //         '10:00',
    //     ],
    //     '10:00' => [
    //         '10:00',
    //         '11:00',
    //     ],
    //     '12:00' => [
    //         '12:00',
    //         '13:00',
    //     ],
    //     ...
    // ]
}
