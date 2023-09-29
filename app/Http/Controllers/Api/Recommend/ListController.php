<?php

namespace App\Http\Controllers\Api\Recommend;

use App\Repository\RecommendRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Recommend\ListRequest;
use App\Http\Requests\Recommend\Transformers\ListTransformer;

class ListController extends ApiController
{
    private $recommendRepository;

    public function __construct(RecommendRepository $recommendRepository)
    {
        $this->recommendRepository = $recommendRepository;
    }

    public function index(ListRequest $request)
    {
        $recommends = $this->recommendRepository->get($request->page, $request->per_page, $request->type_id, $request->tag_id);

        $response = fractal()
            ->collection($recommends)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
