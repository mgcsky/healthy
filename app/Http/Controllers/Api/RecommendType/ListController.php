<?php

namespace App\Http\Controllers\Api\RecommendType;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\RecommendType\Transformers\ListTransformer;
use App\Repository\RecommendTypeRepository;

class ListController extends ApiController
{
    private $recommendTypeRepository;

    public function __construct(RecommendTypeRepository $recommendTypeRepository)
    {
        $this->recommendTypeRepository = $recommendTypeRepository;
    }

    public function index()
    {
        $recommends = $this->recommendTypeRepository->getAll();

        $response = fractal()
            ->collection($recommends)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
