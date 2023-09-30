<?php

namespace App\Repository;

use App\Models\Diary;
use App\Models\MealType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DiaryRepository
{
    /**
     * get Diary of logged in user
     * 
     * @param $page - page of Diary, default by 0
     * @param $perPage - Diart per page, default by 8
     * 
     * @return list of Diary
     * 
     */
    public function get($page, $perPage)
    {
        $page = $page ?? 0;
        $perPage = $perPage ?? 8;
        $user = auth()->user();
        return Diary::where("user_id", $user->id)
            ->orderBy("id", "DESC")
            ->limit($perPage)
            ->offset($page * $perPage)
            ->get();
    }

    /**
     * insert Diary for logged in user
     * 
     * @param int $data
     * 
     * @return boolean
     * 
     */
    public function insert($data)
    {
        $user = auth()->user();
        return Diary::insert([
            "user_id" => $user->id,
            "datetime" => data_get($data, "datetime"),
            "title" => data_get($data, "title"),
            "content" => data_get($data, "content"),
        ]);
    }
}