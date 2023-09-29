<?php

namespace App\Http\Controllers\Api\Recommend;

use App\Repository\RecommendRepository;
use App\Http\Requests\Recommend\AddRequest;
use App\Http\Controllers\Api\ApiController;

class AddController extends ApiController
{
    private $recommendRepository;

    public function __construct(RecommendRepository $recommendRepository)
    {
        $this->recommendRepository = $recommendRepository;
    }

    public function index(AddRequest $request)
    {
        $this->recommendRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
