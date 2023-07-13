<?php

namespace Domain\Cart\DTO;

class CartDTO
{
    public function __construct(
        public readonly int $product_id,
        public readonly int $quantity,
        public readonly int $price,
        public readonly ?int $discount_price,
        public readonly ?string $address,
        public readonly ?string $note,
        public readonly ?string $pay_type,
    ) {
    }

    public function toArray()
    {
        return [
            'product_id'     => $this->product_id,
            'quantity'       => $this->quantity,
            'price'          => $this->price,
            'discount_price' => $this->discount_price,
            'address'        => $this->address,
            'note'           => $this->note,
            'pay_type'       => $this->pay_type,
        ];
    }
}
