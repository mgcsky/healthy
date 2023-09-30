<?php

namespace App\Repository;

use App\Models\RecommendType;

class RecommendTypeRepository
{
    /**
     * get all records of recommend type
     * 
     * @return list of recommend type
     * 
     */

    public function getAll()
    {
        return RecommendType::get();
    }

    /**
     * insert one record of recommend type
     * 
     * @param array $data
     * 
     * @return boolean
     */

    public function insert($data)
    {
        return RecommendType::insert([
            "name" => data_get($data, "name")
        ]);
    }
}