<?php

namespace App\Http\Controllers\Api\Meal;

use App\Repository\GoalRepository;
use App\Http\Requests\Meal\AddRequest;
use App\Http\Controllers\Api\ApiController;
use App\Repository\MealRepository;

class AddController extends ApiController
{
    private $mealRepository;

    public function __construct(MealRepository $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function index(AddRequest $request)
    {
        $this->mealRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
