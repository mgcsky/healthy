<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Exercise;

class ExerciseRepository
{

    /**
     * get Exercises by date and logged in user
     * 
     * @return list of Exercise
     * 
     */
    public function getByDate($date)
    {
        $user = auth()->user();
        return Exercise::whereDate("datetime", "=", $date)
            ->where("user_id", "=", $user->id)
            ->get();
    }

    /**
     * insert Exercise records belong to logged in user
     * 
     * @param array $data
     * @return void
     * 
     */
    public function insert($data)
    {
        $user = auth()->user();
        $datetime = data_get($data, "datetime");
        Exercise::insert([
            "user_id" => $user->id,
            "datetime" => $datetime,
            "name" => data_get($data, "name"),
            "duration" => data_get($data, "duration"),
            "energy_consume" => data_get($data, "energy_consume")
        ]);
    }
    
    /**
     * Count Exercises by date and logged in user
     * 
     * @return int
     * 
     */
    public function totalExerciseByDate($date)
    {
        $user = auth()->user();
        $date = $date ?? Carbon::now();
        return Exercise::where("user_id", "=", $user->id)
            ->whereDate("datetime", "=", $date)
            ->count();
    }
}