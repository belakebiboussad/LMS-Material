<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class LatitudeRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Regular expression for latitude (-90 to 90 with optional decimal places)
        //$regex = '/^[-]?((([0-8]?[0-9])(\\.(\\d{1,8}))?) |(90(\\.0+)?))$/';
       $regex = '/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/';
        if (!preg_match($regex, $value)) {
            $fail('The :attribute must be a valid latitude coordinate.');
        }
    }
}
