<?php

namespace Domain\Coupon\Enums;

use App\Traits\EnumToArray;

enum DiscountTypeEnum: string
{
    use EnumToArray;

    case PERCENT = "PERCENT";
    case FIX_PRICE = "FIX_PRICE";
}
