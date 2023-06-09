<?php

namespace Domain\Documentation\DTO;

class DocumentationDTO
{
    public function __construct(
        public readonly object $title,
        public readonly object $text,
    ) {
    }

    public function toArray()
    {
        return [
            'title' => [
                'tm' => $this->title->tm,
                'ru' => $this->title->ru,
            ],
            'text' => [
                'tm' => $this->text->tm,
                'ru' => $this->text->ru,
            ]
        ];
    }
}
