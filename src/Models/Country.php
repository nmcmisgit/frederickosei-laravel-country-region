<?php

namespace FrederickOsei\LaravelCountryRegion\Models;

use Sushi\Sushi;

class Country extends Model
{
    use Sushi;

    protected $table = 'countries';

    protected $schema = [
        'code' => 'string',
        'code_3' => 'string',
        'numeric_code' => 'integer',
        'name' => 'string',
        'official_name' => 'string',
        'capital' => 'string',
        'calling_code' => 'string',
        'currency_code' => 'string',
        'continent_code' => 'string',
        'flag' => 'string',
    ];

    protected $casts = [
        'numeric_code' => 'integer',
    ];

    public function getRows(): array
    {
        return require __DIR__ . '/../../resources/data/countries.php';
    }

    public function getKeyName()
    {
        return 'code';
    }

    public function regions()
    {
        return Region::query()
            ->where('country_code', $this->code);
    }

    public function scopeByCode($query, string $code)
    {
        return $query->where('code', strtoupper($code));
    }
}