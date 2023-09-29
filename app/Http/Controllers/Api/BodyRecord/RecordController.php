<?php

namespace App\Http\Controllers\Api\BodyRecord;

use App\Repository\BodyRecordRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\BodyRecord\GraphRequest;
use App\Http\Requests\BodyRecord\RecordRequest;
use App\Http\Requests\BodyRecord\Transformers\GraphTransformer;

class RecordController extends ApiController
{
    private $bodyRecordRepository;

    public function __construct(BodyRecordRepository $bodyRecordRepository)
    {
        $this->bodyRecordRepository = $bodyRecordRepository;
    }

    public function index(RecordRequest $request)
    {
        $this->bodyRecordRepository->updateOrInsert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
