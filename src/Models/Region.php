<?php

namespace FrederickOsei\LaravelCountryRegion\Models;

use Sushi\Sushi;

class Region extends Model
{
    use Sushi;

    protected $table = 'regions';

    protected $schema = [
        'country_code' => 'string',
        'code' => 'string',
        'name' => 'string',
        'type' => 'string',
    ];

    public function getRows(): array
    {
        return require __DIR__ . '/../../resources/data/regions.php';
    }

    public function getKeyName()
    {
        return 'code';
    }

    public function country()
    {
        return Country::query()
            ->where('code', $this->country_code)
            ->first();
    }

    public function scopeForCountry($query, string $countryCode)
{
    return $query->where(
        'country_code',
        strtoupper($countryCode)
    );
}
}