<?php

namespace Domain\Cart\DTO;

class CartDTO
{
    public function __construct(
        public readonly ?int $id,
        public readonly int $product_id,
        public readonly int $quantity,
        public readonly ?int $address_id,
        public readonly ?string $note,
        public readonly ?string $pay_type,
        public readonly ?string $delivery_type,
    ) {
    }

    public function toArray()
    {
        return [
            'id'            => $this->id,
            'product_id'    => $this->product_id,
            'quantity'      => $this->quantity,
            'address_id'    => $this->address_id,
            'note'          => $this->note,
            'pay_type'      => $this->pay_type,
            'delivery_type' => $this->delivery_type,
        ];
    }
}
