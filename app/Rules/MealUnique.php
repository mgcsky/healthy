<?php

namespace App\Rules;

use Closure;
use Illuminate\Http\JsonResponse;
use App\Repository\MealRepository;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\Exceptions\HttpResponseException;

class MealUnique implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $request = request();
        $mealRepository = new MealRepository;
        $mealCount = $mealRepository->checkUnique($request->meal_type_id, $request->date);
        if ($mealCount) {
            throw new HttpResponseException(response()->json(
            [
                'error' => trans("validation.unique", ["attribute" => "meal"])
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
        }
    }
}
