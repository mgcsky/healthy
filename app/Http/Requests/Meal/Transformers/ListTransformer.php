<?php

namespace App\Http\Requests\Meal\Transformers;

use App\Models\MealRecord;
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
    public function transform($mealRecord)
    {
        return [
            "date" => $mealRecord->date,
            "image_url" => $mealRecord->image_url,
            "description" => $mealRecord->description,
            "meal_type_name" => $mealRecord->name
        ];
        
    }
}
