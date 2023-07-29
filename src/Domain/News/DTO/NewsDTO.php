<?php

namespace Domain\News\DTO;

use Illuminate\Http\UploadedFile;

class NewsDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly object $title,
        public readonly object $description,
        public readonly ?UploadedFile $image,
    ) {
    }

    public function toArray()
    {
        return [
            'id'    => $this->id,
            'image' => $this->image,
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'description' => [
                'tm' => $this->description->tm ?? "",
                'ru' => $this->description->ru ?? "",
            ]
        ];
    }
}
