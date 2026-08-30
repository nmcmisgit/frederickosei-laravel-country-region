<?php

namespace FrederickOsei\LaravelCountryRegion\Tests\Feature;

use FrederickOsei\LaravelCountryRegion\Models\Country;
use FrederickOsei\LaravelCountryRegion\Tests\TestCase;

class CountryTest extends TestCase
{
    public function test_ghana_exists(): void
    {
        $ghana = Country::find('GH');

        $this->assertNotNull($ghana);
        $this->assertEquals('Ghana', $ghana->name);
    }

    public function test_country_can_be_searched_by_name(): void
    {
        $country = Country::where('name', 'Ghana')->first();

        $this->assertNotNull($country);
        $this->assertEquals('GH', $country->code);
    }

    public function test_countries_have_expected_fields(): void
    {
        $ghana = Country::find('GH');

        $this->assertEquals('GHA', $ghana->code_3);
        $this->assertEquals(288, $ghana->numeric_code);
        $this->assertEquals('+233', $ghana->calling_code);
        $this->assertEquals('GHS', $ghana->currency_code);
    }
}