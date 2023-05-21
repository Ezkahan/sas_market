<?php

namespace Domain\Subscriber\Enums;

use App\Traits\EnumToArray;

enum SubscriberTypeEnum:string
{
    use EnumToArray;

    case MAIL = 'MAIL';
    case SMS = 'SMS';
    case WEB = 'WEB';
    case MOBILE = 'MOBILE';
}
