<?php

namespace App\Http\Controllers\Api\Exercise;

use App\Repository\ExerciseRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Exercise\RecordRequest;
use App\Http\Requests\BodyRecord\Transformers\GraphTransformer;

class RecordController extends ApiController
{
    private $exerciseRepository;

    public function __construct(ExerciseRepository $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function index(RecordRequest $request)
    {
        $this->exerciseRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
