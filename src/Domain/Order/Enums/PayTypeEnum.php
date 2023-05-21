<?php

namespace Domain\Order\Enums;

use App\Traits\EnumToArray;

enum PayTypeEnum:string
{
    use EnumToArray;

    case CASH = 'CASH';
    case TERMINAL = 'TERMINAL';
    case ONLINE = 'ONLINE';
}
