<?php

namespace App\Repository;

use App\Models\RecommendType;

class RecommendTypeRepository
{
    public function getAll()
    {
        return RecommendType::get();
    }

    public function insert($data)
    {
        return RecommendType::insert([
            "name" => data_get($data, "name")
        ]);
    }
}