<?php

namespace App\Http\Requests\MealType\Transformers;

use App\Models\MealType;
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
    public function transform(MealType $mealType)
    {
        return [
            "id" => $mealType->id,
            "name" => $mealType->name
        ];
        
    }
}
