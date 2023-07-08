<?php

namespace Domain\Cart\Enums;

use App\Traits\EnumToArray;

enum CartStatusEnum: string
{
    use EnumToArray;

    case WAITING = "WAITING";
    case IN_PROGRESS = "IN_PROGRESS";
    case IN_DELIVERY = "IN_DELIVERY";
    case DELIVERED = "DELIVERED";
    case CANCELED = "CANCELED";
}
