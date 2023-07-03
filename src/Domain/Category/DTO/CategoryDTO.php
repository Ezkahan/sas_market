<?php

namespace Domain\Category\DTO;

use Illuminate\Http\UploadedFile;

class CategoryDTO
{
    public function __construct(
        public readonly object $name,
        public readonly object $description,
        public readonly int $parent_id,
        public readonly ?UploadedFile $icon,
        public readonly ?UploadedFile $image,
    ) {
    }

    public function toArray()
    {
        return [
            'name' => [
                'tm' => $this->name->tm,
                'ru' => $this->name->ru,
            ],
            'description' => [
                'tm' => $this->description->tm ?? "",
                'ru' => $this->description->ru ?? "",
            ],
            'parent_id' => $this->parent_id,
            'icon'      => $this->icon,
            'image'     => $this->image,
        ];
    }
}
