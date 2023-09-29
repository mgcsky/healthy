<?php

namespace App\Http\Controllers\Api\User;

use App\Repository\UserRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\Transformers\UserTransformer;

class RegisterController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(RegisterRequest $request)
    {
        $data = $request->all();

        $user = $this->userRepository->insert($data);

        $response = fractal($user, new UserTransformer)->toArray();

        return $this->respondSuccess($response, trans('response.post_successed'));
    }
}
