<?php

namespace App\Http\Controllers\Api\Diary;

use App\Repository\DiaryRepository;
use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Diary\ListRequest;
use App\Http\Requests\Diary\Transformers\ListTransformer;

class ListController extends ApiController
{
    private $diaryRepository;

    public function __construct(DiaryRepository $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    public function index(ListRequest $request)
    {
        $mealTypes = $this->diaryRepository->get($request->page, $request->perPage);

        $response = fractal()
            ->collection($mealTypes)
            ->transformWith(new ListTransformer())
            ->includeCharacters()
            ->toArray();

        return $this->respondSuccess($response, trans("response.get_successed"));
    }
}
