<?php

namespace App\Http\Requests\Meal;

use App\Http\Requests\BaseRequest;
use App\Rules\MealUnique;

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
            'meal_type_id' => ['required','integer',new MealUnique()],
            'date' => 'required|date',
            'image_url' => 'required',
            'description' => 'nullable|max:255',
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
