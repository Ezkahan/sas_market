<?php

namespace Domain\Cart\Enums;

use App\Traits\EnumToArray;

enum DeliveryTypeEnum: string
{
    use EnumToArray;

    case DEFAULT = "DEFAULT";
    case EXPRESS = "EXPRESS";
}
