<?php

namespace App\Repository;

use App\Models\Goal;

class GoalRepository
{

    public function getGoal()
    {
        $user = auth()->user();
        return Goal::where("user_id", "=", $user->id)->first();
    }

    public function insert($data)
    {
        $user = auth()->user();
        Goal::updateOrInsert([
            "user_id" => $user->id
        ],[
            "number_of_exercises" => data_get($data, "number_of_exercises")
        ]);
    }
}