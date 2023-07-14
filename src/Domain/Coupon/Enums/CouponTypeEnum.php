<?php

namespace Domain\Coupon\Enums;

use App\Traits\EnumToArray;

enum CouponTypeEnum: string
{
    use EnumToArray;

    case CART = "CART";
    case DELIVERY = "DELIVERY";
}
