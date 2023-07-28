<?php

namespace Domain\Page\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Page extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'text',
    ];

    protected $fillable = [
        'title',
        'text',
        'image',
        'position',
    ];

    protected $casts = [
        'title'       => 'json',
        'description' => 'json',
    ];

    public function getImage()
    {
        $image = $this->image;
        return is_file(public_path() . $image) ? url('/') . $image : defaultImage();
    }
}
