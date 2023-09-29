<?php

namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    public function getAll()
    {
        return Tag::get();
    }

    public function insert($data)
    {
        return Tag::insert([
            "name" => data_get($data, "name")
        ]);
    }
}