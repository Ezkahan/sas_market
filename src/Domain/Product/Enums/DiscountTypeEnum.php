<?php

namespace Domain\Product\Enums;

use App\Traits\EnumToArray;

enum DiscountTypeEnum: string
{
    use EnumToArray;

    case FIX_PRICE = "FIX_PRICE";
    case PERCENT = "PERCENT";
}
