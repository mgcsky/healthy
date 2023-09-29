<?php

namespace App\Http\Controllers\Api\RecommendType;

use App\Http\Requests\RecommendType\AddRequest;
use App\Http\Controllers\Api\ApiController;
use App\Repository\RecommendTypeRepository;

class AddController extends ApiController
{
    private $recommendTypeRepository;

    public function __construct(RecommendTypeRepository $recommendTypeRepository)
    {
        $this->recommendTypeRepository = $recommendTypeRepository;
    }

    public function index(AddRequest $request)
    {
        $this->recommendTypeRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
