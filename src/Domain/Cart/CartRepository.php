<?php

namespace Domain\Brand;

use Domain\Cart\DTO\CartDTO;
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
            'pay_type' => $data->pay_type,
        ]);

        $this->addProductToCart($cart, $data);
    }

    public function addProductToCart(Cart $cart, CartDTO $data)
    {
        $cart->products()->create([
            'product_id' => $data->product_id,
            'quantity'   => $data->quantity,
        ]);
    }
}
