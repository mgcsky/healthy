<?php

namespace App\Http\Controllers\Api\HashTag;

use App\Repository\TagRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\HashTag\Transformers\ListTransformer;

class ListController extends ApiController
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index()
    {
        $recommends = $this->tagRepository->getAll();

        $response = fractal()
            ->collection($recommends)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
