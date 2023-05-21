<?php

namespace Domain\Subscription\Enums;

use App\Traits\EnumToArray;

enum SubscriptionTypeEnum:string
{
    use EnumToArray;

    case MAIL = 'MAIL';
    case SMS = 'SMS';
    case WEB = 'WEB';
    case MOBILE = 'MOBILE';
}
