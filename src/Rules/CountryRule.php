<?php

namespace FrederickOsei\LaravelCountryRegion\Rules;

use FrederickOsei\LaravelCountryRegion\Models\Country;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CountryRule implements ValidationRule
{
    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail
    ): void {
        if (! Country::query()->where('code', $value)->exists()) {
            $fail("The selected {$attribute} is not a valid country.");
        }
    }
}