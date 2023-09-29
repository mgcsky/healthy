<?php

namespace App\Http\Requests\Recommend;

use App\Http\Requests\BaseRequest;

class AddRequest extends BaseRequest
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
            'recommend_type_id' => "required|exists:recommend_types,id",
            'tag_ids' => "nullable|array",
            'tag_ids.*' => "exists:tags,id",
            'description'=> "required",
            'image_url'=> "required",
            'datetime'=> "required|date"
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
