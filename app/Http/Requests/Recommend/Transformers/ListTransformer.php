<?php

namespace App\Http\Requests\Recommend\Transformers;

use App\Models\MealType;
use App\Models\Recommend;
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
    public function transform(Recommend $recommend)
    {
        return [
            "description" => $recommend->description,
            "image_url" => $recommend->image_url,
            "datetime" => $recommend->datetime,
            "tag" => json_decode($recommend->tag),
        ];
        
    }
}
