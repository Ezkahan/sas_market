<?php

namespace Domain\Brand\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'logo',
    ];

    protected $casts = [];
}
