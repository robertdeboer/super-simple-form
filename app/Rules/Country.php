<?php

declare(strict_types=1);

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class Country implements ValidationRule
{
    public const REGEX = '/^[a-z ]+$/i';

    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!empty($value) && preg_match(self::REGEX, $value) !== 1) {
            $fail('The :attribute may only contain letters and spaces');
        }
    }
}
