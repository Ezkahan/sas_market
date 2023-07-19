<?php

namespace Domain\Cart;

use Domain\Cart\DTO\CartDTO;
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
        if ($data->id) {
            $cart = auth()->user()->carts()->where('id', '=', $data->id)->first();

            $cart->update([
                'address_id'    => $data->address_id,
                'note'          => $data->note,
                'pay_type'      => $data->pay_type,
                'delivery_type' => $data->delivery_type,
            ]);
        } else {
            $cart = auth()->user()->carts()->create([
                'address_id'    => $data->address_id,
                'note'          => $data->note,
                'pay_type'      => $data->pay_type,
                'delivery_type' => $data->delivery_type,
            ]);
        }

        return $this->addProductToCart($cart, $data);
    }

    public function addProductToCart(Cart $cart, CartDTO $data)
    {
        $product = $this->productRepo->findByID($data->product_id);
        $cartProduct = $cart->products()->where('product_id', '=', $data->product_id)->get();

        if ($cartProduct) {
            $cartProduct->update(['quantity' => $data->quantity]);
        } else {
            $cart->products()->create([
                'product_id'     => $data->product_id,
                'quantity'       => $data->quantity,
                'price'          => $product->price,
                'discount_price' => $product->discount_price,
            ]);
        }

        return $cart;
    }

    public function removeFromCart(int $product_id)
    {
        $user = auth()->user();

        if ($user->getLastCart()->products()->where('product_id', '=', $product_id)->delete()) {
            return 'success';
        }

        return 'error';
    }
}
