<?php

namespace App\Http\Controllers\Api\Diary;

use App\Repository\DiaryRepository;
use App\Http\Requests\Diary\AddRequest;
use App\Http\Controllers\Api\ApiController;

class AddController extends ApiController
{
    private $diaryRepository;

    public function __construct(DiaryRepository $diaryRepository)
    {
        $this->diaryRepository = $diaryRepository;
    }

    public function index(AddRequest $request)
    {
        $this->diaryRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
