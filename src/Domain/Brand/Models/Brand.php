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

    public function getLogoAttribute()
    {
        return is_file(public_path() . $this->logo) ? url("/") . $this->logo : defaultImage();
    }
}
