<?php

namespace App\Repository;

use App\Models\MealRecord;

class MealRepository
{
    public function get($page, $perPage, $typeId)
    {
        $page = $page ?? 0;
        $perPage = $perPage ?? 8;
        $user = auth()->user();
        $query = MealRecord::join("meal_types", "meal_records.meal_type_id", "=", "meal_types.id")
            ->where("user_id", $user->id)
            ->select("date", "image_url", "description", "name")
            ->limit($perPage)
            ->offset($page * $perPage);
            
        if($typeId) {
            $query->where("meal_type_id", $typeId);
        }

        return $query->get();
    }

    public function insert($data)
    {
        $user = auth()->user();
        return MealRecord::insert([
            'user_id' => $user->id,
            'meal_type_id' => data_get($data, "meal_type_id"),
            'date' => data_get($data, "date"),
            'image_url' => data_get($data, "image_url"),
            'description' => data_get($data, "description")
        ]);
    }

    public function checkUnique($mealTypeId, $date)
    {
        $user = auth()->user();
        return MealRecord::where("user_id", "=", $user->id)
            ->where("meal_type_id", "=", $mealTypeId)
            ->where("date", "=", $date)
            ->count();
    }
}