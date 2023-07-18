<?php

namespace Domain\Banner\Enums;

use App\Traits\EnumToArray;

enum BannerPositionEnum: string
{
    use EnumToArray;

    case TOP = 'TOP';
    case MAIN = 'MAIN';
    case BOTTOM = 'BOTTOM';
}
