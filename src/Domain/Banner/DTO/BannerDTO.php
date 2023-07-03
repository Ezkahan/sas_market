<?php

namespace Domain\Banner\DTO;

use Illuminate\Http\UploadedFile;

class BannerDTO
{
    public function __construct(
        public readonly UploadedFile $image,
        public readonly string $link,
        public readonly int $category_id,
        public readonly string $position,
        public readonly string $type,
    ) {
    }

    public function toArray()
    {
        return [
            'image'       => $this->image,
            'link'        => $this->link,
            'category_id' => $this->category_id,
            'position'    => $this->position,
            'type'        => $this->type,
        ];
    }
}
