<?php

namespace App\Http\Controllers\Api\HashTag;

use App\Http\Requests\HashTag\AddRequest;
use App\Http\Controllers\Api\ApiController;
use App\Repository\TagRepository;

class AddController extends ApiController
{
    private $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(AddRequest $request)
    {
        $this->tagRepository->insert($request->all());

        return $this->respondSuccess([], trans("response.post_successed"));
    }
}
