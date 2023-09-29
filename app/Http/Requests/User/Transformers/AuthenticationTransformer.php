<?php

namespace App\Http\Requests\User\Transformers;

use App\Models\User;
use Illuminate\Foundation\Mix;
use League\Fractal\TransformerAbstract;

class AuthenticationTransformer extends TransformerAbstract
{

    protected $token;

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

    public function __construct($token)
    {
        $this->token = $token;
    }
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(User $user)
    {
        return [
            "name" => data_get($user, 'name'),
            "email" => data_get($user, "email"),
            "access_token" => $this->token
        ];
    }
}
