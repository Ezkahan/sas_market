<?php

namespace App\Http\GraphQL\Cart\Queries;

final class GetOrderHours
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // $carbon = new Carbon();
        // $from = now()->tz("Asia/Ashgabat");
        // $startHour = $from->startOfHour();
        // $startTime = "09:00";
        // $cutTime = "22:30";
        // $interval = "1";
        // $until = $carbon->endOfDay()->subHour(1)->subMinute(29)->subSecond(59);
        // $time = $startHour->format("H:i") . ' - ' . $from->addHour(1)->format("H:i");

        // Log::info($until);
        // Log::error($startHour);
        // Log::emergency($time);


        // $hours = \Carbon\CarbonPeriod::since('09:00')->hours(1)->until('22:30')->toArray();
        // Log::debug($hours);

        // $data = [];
        // $intervals = CarbonPeriod::since($startHour)->hours($interval)->until($cutTime)->toArray();
        // foreach ($intervals as $interval) {
        //     $to = next($intervals);
        //     Log::alert($to);
        //     if ($to !== false) {
        //         array_push($data, $interval->format("H:i") . '-' . $to->toTimeString());
        //     }
        // }

        // Log::debug($data);
        return;
    }
}
