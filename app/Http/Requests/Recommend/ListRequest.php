<?php

namespace App\Http\Requests\Recommend;

use App\Http\Requests\BaseRequest;

class ListRequest extends BaseRequest
{


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "type_id" => "nullable|exists:recommend_types,id",
            "tag_id" => "nullable|exists:tags,id",
            "page" => "nullable|integer",
            "per_page" => "nullable|integer"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [];
    }

}
