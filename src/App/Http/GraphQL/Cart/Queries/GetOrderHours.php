<?php

namespace App\Http\GraphQL\Cart\Queries;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;

final class GetOrderHours
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $carbon = new Carbon();
        $from = now()->tz("Asia/Ashgabat");
        $startHour = $from->startOfHour();
        $startTime = "09:00";
        $cutTime = "18:00";
        $interval = "1";
        $until = $carbon->endOfDay()->subHour(1)->subMinute(29)->subSecond(59);
        $time = $startHour->format("H:i") . ' - ' . $from->addHour(1)->format("H:i");

        $data = [];
        $intervals = CarbonPeriod::since($startHour)->hours($interval)->until($cutTime)->toArray();
        foreach ($intervals as $interval) {
            $to = next($intervals);
            if ($to !== false && $to->format('H:i') <= "18:00") {
                array_push($data, $interval->format("H:i") . '-' . $to->format('H:i'));
            }
        }

        Log::debug($data);

        return $data;
    }
}
