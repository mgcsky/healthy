<?php

namespace App\Http\Controllers\Api\MealType;

use App\Repository\MealTypeRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\MealType\Transformers\ListTransformer;

class ListController extends ApiController
{
    private $mealTypeRepository;

    public function __construct(MealTypeRepository $mealTypeRepository)
    {
        $this->mealTypeRepository = $mealTypeRepository;
    }

    public function index()
    {
        $mealTypes = $this->mealTypeRepository->getAll();

        $response = fractal()
            ->collection($mealTypes)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
