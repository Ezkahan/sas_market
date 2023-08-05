<?php

namespace Domain\Support\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'title',
        'email',
        'subject',
    ];
}
