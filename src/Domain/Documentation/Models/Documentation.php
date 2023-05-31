<?php

namespace Domain\Documentation\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Documentation extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'text',
    ];

    protected $fillable = [
        'title',
        'text',
        'preview',
    ];

    protected $casts = [
        'title' => 'json',
        'text' => 'json',
    ];

    public function getTitleAttribute()
    {
        return $this->getTranslations('title');
    }

    public function getTextAttribute()
    {
        return $this->getTranslations('text');
    }

    public function getPreview()
    {
        return $this->preview;
    }
}
