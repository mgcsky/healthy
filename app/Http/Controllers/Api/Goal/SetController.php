<?php

namespace App\Http\Controllers\Api\Goal;

use App\Repository\GoalRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Exercise\RecordRequest;
use App\Http\Requests\Goal\SetRequest;

class SetController extends ApiController
{
    private $goalRepository;

    public function __construct(GoalRepository $goalRepository)
    {
        $this->goalRepository = $goalRepository;
    }

    public function index(SetRequest $request)
    {
        $this->goalRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
