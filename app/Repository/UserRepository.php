<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * get user by email
     * 
     * @return User
     * 
     */

    public function getUserByEmail($email)
    {
        return User::where("email", $email)->first();
    }

    /**
     * insert one record of User
     * 
     * @param array $data
     * 
     * @return User
     * 
     */
    public function insert($data)
    {
        return User::firstOrCreate([
            'email' => data_get($data, "email")
        ],[
            'name' => data_get($data, "name"),
            'email' => data_get($data, "email"),
            'password' => Hash::make(data_get($data, "password"))
        ]);
    }
}