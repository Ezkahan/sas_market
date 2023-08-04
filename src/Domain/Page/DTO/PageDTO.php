<?php

namespace Domain\Page\DTO;

use Illuminate\Http\UploadedFile;

class PageDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly object $title,
        public readonly object $text,
        public readonly string $position,
        public readonly ?UploadedFile $image,
    ) {
    }

    public function toArray()
    {
        return [
            'id'       => $this->id,
            'image'    => $this->image,
            'position' => $this->position,
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'text' => [
                'tm' => $this->text->tm ?? "",
                'ru' => $this->text->ru ?? "",
            ]
        ];
    }
}
