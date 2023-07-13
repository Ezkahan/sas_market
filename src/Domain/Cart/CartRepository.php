<?php

namespace Domain\Cart;

use Domain\Cart\DTO\CartDTO;
use Domain\Cart\Enums\CartPayTypeEnum;
use Domain\Cart\Models\Cart;

class CartRepository
{
    protected Cart $model;

    public function __construct(Cart $cart)
    {
        $this->model = $cart;
    }

    public function addToCart(CartDTO $data)
    {
        $cart = $this->model->create([
            'user_id'  => auth()->id(),
            'address'  => $data->address,
            'note'     => $data->note,
            'pay_type' => $data->pay_type ?? CartPayTypeEnum::CASH->value,
        ]);

        return $this->addProductToCart($cart, $data);
    }

    public function addProductToCart(Cart $cart, CartDTO $data)
    {
        $cart->products()->create([
            'product_id'     => $data->product_id,
            'quantity'       => $data->quantity,
            'price'          => $data->price,
            'discount_price' => $data->discount_price,
        ]);

        return $cart;
    }

    public function removeFromCart(int $product_id)
    {
        return;
    }
}
