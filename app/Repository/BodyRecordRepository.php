<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\BodyRecord;

class BodyRecordRepository
{

    /**
     * get Body record of logged in user by day
     * 
     * @return list of BodyRecord
     * 
     */

    public function getByDay()
    {
        $user = auth()->user();
        $oneDayAgo = Carbon::now()->subDay();
        return BodyRecord::whereDate("date", ">=", $oneDayAgo)
        ->where("user_id", "=", $user->id)
        ->get();
    }

    /**
     * get Body record of logged in user by week
     * 
     * @return list of BodyRecord
     * 
     */

    public function getByWeek()
    {
        $user = auth()->user();
        $oneWeekAgo = Carbon::now()->subWeek();
        return BodyRecord::whereDate("date", ">=", $oneWeekAgo)
        ->where("user_id", "=", $user->id)
        ->get();
    }

    /**
     * get Body record of logged in user by month
     * 
     * @return list of BodyRecord
     * 
     */

    public function getByMonth()
    {
        $user = auth()->user();
        $oneMonthAgo = Carbon::now()->subMonth();
        return BodyRecord::whereDate("date", ">=", $oneMonthAgo)
        ->where("user_id", "=", $user->id)
        ->get();
    }

    /**
     * get Body record of logged in user by year
     * 
     * @return list of BodyRecord
     * 
     */

    public function getByYear()
    {
        $user = auth()->user();
        $oneYearAgo = Carbon::now()->subYear();
        return BodyRecord::selectRaw("month(date) as month, year(date) as year, avg(weight) as weight, avg(body_fat) as body_fat")
        ->whereDate("date", ">=", $oneYearAgo)
        ->where("user_id", "=", $user->id)
        ->groupByRaw("month(date), year(date)")
        ->get();
    }

    /**
     * set of update Body record of logged in user by date
     * 
     * @param int $data
     * @return void
     * 
     */

    public function updateOrInsert($data)
    {
        $user = auth()->user();
        $date = data_get($data, "date") ?? Carbon::now();
        BodyRecord::updateOrInsert([
            "user_id" => $user->id,
            "date" => $date,
        ],[
            "weight" => data_get($data, "weight"),
            "body_fat" => data_get($data, "body_fat")
        ]);
    }
}