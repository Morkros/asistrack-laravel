<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class ValidateAge implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, $value, Closure $fail): void
    {
        $age = Carbon::parse($value)->diffInYears(Carbon::now());
        if ($age < 18) {
            $fail("La edad ingresada es menor a 18 años.");
        }
    }
}

