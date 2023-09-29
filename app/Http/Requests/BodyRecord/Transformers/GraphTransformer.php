<?php

namespace App\Http\Requests\BodyRecord\Transformers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Mix;
use League\Fractal\TransformerAbstract;

class GraphTransformer extends TransformerAbstract
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
    public function transform($data)
    {
        if ($data->date) {
            return [
                "date" => $data->date,
                "weight" => $data->weight,
                "body_fat" => $data->body_fat,
            ];
        }
        return [
            "date" => Carbon::createFromDate($data->year, $data->month, 1)->toDateString(),
            "weight" => $data->weight,
            "body_fat" => $data->body_fat,
        ];
        
    }
}
