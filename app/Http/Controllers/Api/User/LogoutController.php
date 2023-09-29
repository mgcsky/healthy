<?php

namespace App\Http\Controllers\Api\User;

use Auth;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use App\Http\Controllers\Api\ApiController;

class LogoutController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $token = Auth::guard('api')->user()->token();
        $token->revoke();

        return $this->respondSuccess([], trans("auth.logout"));
    }
}
