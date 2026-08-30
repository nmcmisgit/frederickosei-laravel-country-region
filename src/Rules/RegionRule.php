<?php

namespace FrederickOsei\LaravelCountryRegion\Rules;

use FrederickOsei\LaravelCountryRegion\Models\Region;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class RegionRule implements ValidationRule
{
    public function __construct(
        protected ?string $country = null
    ) {
    }

    public function validate(
        string $attribute,
        mixed $value,
        Closure $fail
    ): void {
        $query = Region::query()
            ->where('code', $value);

        if ($this->country !== null) {
            $query->where('country_code', $this->country);
        }

        if (! $query->exists()) {
            $fail("The selected {$attribute} is not a valid region.");
        }
    }
}