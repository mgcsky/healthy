<?php

namespace App\Repository;

use App\Models\Goal;

class GoalRepository
{

    /**
     * get Goal records belong to logged in user
     * 
     * @return Goal
     * 
     */
    public function getGoal()
    {
        $user = auth()->user();
        return Goal::where("user_id", "=", $user->id)->first();
    }

    /**
     * set or update Goal records belong to logged in user
     * 
     * @param array $data
     * @return void
     * 
     */
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