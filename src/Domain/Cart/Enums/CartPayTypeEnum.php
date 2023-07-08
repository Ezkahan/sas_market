<?php

namespace Domain\Cart\Enums;

use App\Traits\EnumToArray;

enum CartPayTypeEnum: string
{
    use EnumToArray;

    case CASH = "CASH";
    case CARD = "CARD";
}
