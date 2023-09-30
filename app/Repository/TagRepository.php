<?php

namespace App\Repository;

use App\Models\Tag;

class TagRepository
{
    /**
     * get all records of HashTag
     * 
     * @return list of HashTag
     * 
     */

    public function getAll()
    {
        return Tag::get();
    }
    
    /**
     * insert one record of HashTag
     * 
     * @param array $data
     * 
     * @return boolean
     * 
     */
    public function insert($data)
    {
        return Tag::insert([
            "name" => data_get($data, "name")
        ]);
    }
}