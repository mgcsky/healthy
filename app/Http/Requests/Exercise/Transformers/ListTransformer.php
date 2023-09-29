<?php

namespace App\Http\Requests\Exercise\Transformers;

use App\Models\Exercise;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Mix;
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
    public function transform(Exercise $exercise)
    {
        return [
            "name" => $exercise->name,
            "duration" => $exercise->duration,
            "energy_consume" => $exercise->energy_consume,
        ];
        
    }
}
