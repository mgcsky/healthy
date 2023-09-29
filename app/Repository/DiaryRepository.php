<?php

namespace App\Repository;

use App\Models\Diary;
use App\Models\MealType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DiaryRepository
{
    public function get($page, $perPage)
    {
        $page = $page ?? 0;
        $perPage = $perPage ?? 8;
        $user = auth()->user();
        return Diary::where("user_id", $user->id)
            ->limit($perPage)
            ->offset($page * $perPage)
            ->get();
    }

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