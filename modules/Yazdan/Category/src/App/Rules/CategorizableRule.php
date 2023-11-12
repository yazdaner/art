<?php

namespace Yazdan\Category\App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CategorizableRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!class_exists($value) && !method_exists($value, "category")) {
            $fail('The validation of :attribute has error message.');
        }
    }
}
