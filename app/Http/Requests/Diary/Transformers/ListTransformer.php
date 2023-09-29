<?php

namespace App\Http\Requests\Diary\Transformers;

use App\Models\Diary;
use League\Fractal\TransformerAbstract;

class ListTransformer extends TransformerAbstract
{


    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Diary $diary)
    {
        return [
            "datetime" => $diary->datetime,
            "title" => $diary->title,
            "content" => $diary->content
        ];
        
    }
}
