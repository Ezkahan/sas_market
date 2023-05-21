<?php

namespace Domain\Banner\Enums;

use App\Traits\EnumToArray;

enum BannerEnum:string
{
    use EnumToArray;

    case TOP = 'TOP';
    case MAIN = 'MAIN';
    case BOTTOM = 'BOTTOM';
}
