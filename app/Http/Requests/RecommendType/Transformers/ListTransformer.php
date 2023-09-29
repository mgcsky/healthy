<?php

namespace App\Http\Requests\RecommendType\Transformers;

use App\Models\RecommendType;
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
    public function transform(RecommendType $recommendType)
    {
        return [
            "id" => $recommendType->id,
            "name" => $recommendType->name
        ];
        
    }
}
