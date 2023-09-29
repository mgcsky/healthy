<?php

namespace App\Http\Controllers\Api\MealType;

use App\Repository\MealTypeRepository;
use App\Http\Requests\MealType\AddRequest;
use App\Http\Controllers\Api\ApiController;

class AddController extends ApiController
{
    private $mealTypeRepository;

    public function __construct(MealTypeRepository $mealTypeRepository)
    {
        $this->mealTypeRepository = $mealTypeRepository;
    }

    public function index(AddRequest $request)
    {
        $this->mealTypeRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
