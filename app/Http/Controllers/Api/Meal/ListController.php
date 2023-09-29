<?php

namespace App\Http\Controllers\Api\Meal;

use App\Http\Requests\Meal\ListRequest;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Meal\Transformers\ListTransformer;
use App\Repository\MealRepository;

class ListController extends ApiController
{
    private $mealRepository;

    public function __construct( MealRepository $mealRepository)
    {
        $this->mealRepository = $mealRepository;
    }

    public function index(ListRequest $request)
    {
        $meals = $this->mealRepository->get($request->page, $request->per_page, $request->type_id);

        
        $response = fractal()
            ->collection($meals)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
