<?php

namespace App\Repository;

use App\Models\MealType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MealTypeRepository
{
    public function getAll()
    {
        return MealType::get();
    }

    public function insert($data)
    {
        return MealType::insert([
            "name" => data_get($data, "name")
        ]);
    }
}