<?php

namespace Domain\Cart;

use Domain\Cart\DTO\CartDTO;
use Domain\Cart\Enums\CartPayTypeEnum;
use Domain\Cart\Models\Cart;
use Domain\Product\ProductRepository;

class CartRepository
{
    protected Cart $model;
    protected ProductRepository $productRepo;

    public function __construct(
        Cart $cart,
        ProductRepository $productRepo
    ) {
        $this->model = $cart;
        $this->productRepo = $productRepo;
    }

    public function addToCart(CartDTO $data)
    {
        $cart = $this->model->create([
            'user_id'       => auth()->id(),
            'address_id'    => $data->address_id,
            'note'          => $data->note,
            'pay_type'      => $data->pay_type,
            'delivery_type' => $data->delivery_type,
        ]);

        return $this->addProductToCart($cart, $data);
    }

    public function addProductToCart(Cart $cart, CartDTO $data)
    {
        $product = $this->productRepo->findByID($data->product_id);

        $cart->products()->create([
            'product_id'     => $data->product_id,
            'quantity'       => $data->quantity,
            'price'          => $product->price,
            'discount_price' => $product->discount_price,
        ]);

        return $cart;
    }

    public function removeFromCart(int $product_id)
    {
        $user = auth()->user();

        if ($user->cart()->products()->where('product_id', '=', $product_id)->delete()) {
            return 'success';
        }

        return 'error';
    }
}
