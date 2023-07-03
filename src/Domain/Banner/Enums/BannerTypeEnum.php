<?php

namespace Domain\Banner\Enums;

use App\Traits\EnumToArray;

enum BannerTypeEnum: string
{
    use EnumToArray;

    case WEB = 'WEB';
    case MOBILE = 'MOBILE';
}
