<?php

namespace App\Http\Controllers\Api\Goal;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\BodyRecord\GraphRequest;
use App\Http\Requests\BodyRecord\Transformers\GraphTransformer;
use App\Http\Requests\Exercise\ListRequest;
use App\Http\Requests\Exercise\Transformers\ListTransformer;
use App\Repository\ExerciseRepository;
use App\Repository\GoalRepository;
use Carbon\Carbon;

class ProgressController extends ApiController
{
    private $goalRepository;
    private $exerciseRepository;

    public function __construct(GoalRepository $goalRepository, ExerciseRepository $exerciseRepository)
    {
        $this->goalRepository = $goalRepository;
        $this->exerciseRepository = $exerciseRepository;
    }

    public function index(ListRequest $request)
    {
        $goal = $this->goalRepository->getGoal();
        $totalOfExcercise = $this->exerciseRepository->totalExerciseByDate($request->date);

        if (!$goal) {
            return $this->respondError(trans("validation.goal"), 422);
        }

        $response = [
            "date" => $request->date ?? Carbon::now()->toDateString(),
            "score" => $totalOfExcercise / $goal->number_of_exercises * 100
        ];

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
