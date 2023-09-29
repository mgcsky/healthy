<?php

namespace App\Http\Controllers\Api\User;

use Auth;
use App\Repository\UserRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\Transformers\UserTransformer;

class UserController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $user = Auth::guard('api')->user();

        $response = fractal($user, new UserTransformer)->toArray();

        return $this->respondSuccess($response, trans('response.post_successed'));
    }
}
