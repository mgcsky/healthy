<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\BodyRecord\GraphRequest;
use App\Http\Requests\BodyRecord\Transformers\GraphTransformer;
use App\Http\Requests\Exercise\ListRequest;
use App\Http\Requests\Exercise\Transformers\ListTransformer;
use App\Repository\ExerciseRepository;

class ListController extends ApiController
{
    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function index(ListRequest $request)
    {
        $exercise = $this->exerciseRepository->getByDate($request->date);

        $response = fractal()
            ->collection($exercise)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
