<?php

namespace App\Http\Controllers\Api\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Api\ApiController;
use App\Repository\UserRepository;
use App\Http\Requests\User\AuthenticationRequest;
use App\Http\Requests\User\Transformers\AuthenticationTransformer;

class AuthController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(AuthenticationRequest $request)
    {
        $user = $this->userRepository->getUserByEmail($request->email);

        if ($user && Hash::check($request->password, $user->password)) {
            $accessToken = $user->createToken(User::CUSTOMER_TOKEN_NAME)->accessToken;
        } else {
            return $this->respondUnauthorized(trans("auth.failed"));
        }

        $response = fractal($user, new AuthenticationTransformer($accessToken))->toArray();

        return $this->respondSuccess($response, trans("auth.successed"));
    }
}
