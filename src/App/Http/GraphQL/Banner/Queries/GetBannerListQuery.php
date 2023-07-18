<?php

namespace App\Http\GraphQL\Banner\Queries;

use Domain\Banner\Enums\BannerPositionEnum;
use Domain\Banner\Enums\BannerTypeEnum;
use Domain\Banner\Models\Banner;

final class GetBannerListQuery
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $type = $args["type"] ?? "";
        $position = $args["position"] ?? "";

        if (!$type && !$position) {
            return Banner::all();
        }

        if ($type) {
            return Banner::where("type", '=', $type)->get();
        }

        return Banner::where('position', '=', $position)->get();
    }
}
