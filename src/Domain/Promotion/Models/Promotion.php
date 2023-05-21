<?php

namespace Domain\Promotion\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'banner',
        'started_at',
        'ended_at',
        'percent',
        'fix_price',
        'link',
        'status',
    ];

    protected $casts = [];

    protected $dates = [
        'started_at',
        'ended_at',
    ];
}
