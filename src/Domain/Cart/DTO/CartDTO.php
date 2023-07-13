<?php

namespace Domain\Cart\DTO;

class CartDTO
{
    public function __construct(
        public readonly int $product_id,
        public readonly int $quantity,
        public readonly ?string $address,
        public readonly ?string $note,
        public readonly ?string $pay_type,
    ) {
    }

    public function toArray()
    {
        return [
            'product_id' => $this->product_id,
            'quantity'   => $this->quantity,
            'address'    => $this->address,
            'note'       => $this->note,
            'pay_type'   => $this->pay_type,
        ];
    }
}
