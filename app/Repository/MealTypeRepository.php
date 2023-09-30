<?php

namespace App\Repository;

use App\Models\MealType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MealTypeRepository
{
    /**
     * get all records of meal type
     * 
     * @return list of MealType
     * 
     */

    public function getAll()
    {
        return MealType::get();
    }

    /**
     * insert one record of MealType
     * 
     * @param array $data
     * 
     * @return boolean
     */

    public function insert($data)
    {
        return MealType::insert([
            "name" => data_get($data, "name")
        ]);
    }
}