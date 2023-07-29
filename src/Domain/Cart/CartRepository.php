<?php

namespace Domain\Cart;

use Domain\Cart\DTO\CartDTO;
use Domain\Cart\Enums\CartStatusEnum;
use Domain\Cart\Models\Cart;
use Domain\Product\ProductRepository;
use Domain\User\Models\User;
use Illuminate\Support\Facades\Auth;

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
        $cart = auth()->user()->getActiveCart();
        return $this->addProductToCart($cart, $data);
    }

    public function cartCheckout(array $data)
    {
        $cart = auth()->user()->getActiveCart();
        $cart->update([
            'address_id'    => $data["address_id"],
            'note'          => $data["note"],
            'pay_type'      => $data["pay_type"],
            'delivery_type' => $data["delivery_type"],
            'status'        => CartStatusEnum::WAITING->value,
        ]);
        return $cart;
    }

    public function addProductToCart(Cart $cart, CartDTO $data)
    {
        $product = $this->productRepo->findByID($data->product_id);
        $cartProduct = $cart->products()->where('product_id', '=', $data->product_id)->first();

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
        if (auth()->user()->getActiveCart()->products()->where('product_id', '=', $product_id)->delete()) {
            return 'success';
        }
        return 'error';
    }
}
