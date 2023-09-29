<?php

namespace App\Http\Requests\HashTag\Transformers;

use App\Models\Tag;
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
    public function transform(Tag $tag)
    {
        return [
            "id" => $tag->id,
            "name" => $tag->name
        ];
        
    }
}
