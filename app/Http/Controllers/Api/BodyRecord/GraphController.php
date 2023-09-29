<?php

namespace App\Http\Controllers\Api\BodyRecord;

use App\Repository\BodyRecordRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\BodyRecord\GraphRequest;
use App\Http\Requests\BodyRecord\Transformers\GraphTransformer;

class GraphController extends ApiController
{
    private $bodyRecordRepository;

    public function __construct(BodyRecordRepository $bodyRecordRepository)
    {
        $this->bodyRecordRepository = $bodyRecordRepository;
    }

    public function index(GraphRequest $request)
    {
        $timeUnit = $request->time_unit ?? "day";

        switch ($timeUnit) {
            case 'week':
                $bodyRecords = $this->bodyRecordRepository->getByWeek();
                break;

            case 'month':
                $bodyRecords = $this->bodyRecordRepository->getByMonth();
                break;

            case 'year':
                $bodyRecords = $this->bodyRecordRepository->getByYear();
                break;

            default:
                $bodyRecords = $this->bodyRecordRepository->getByDay();
                break;
        }

        $response = fractal()
            ->collection($bodyRecords)
            ->transformWith(new GraphTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
