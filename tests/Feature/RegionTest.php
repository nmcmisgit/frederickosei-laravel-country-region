<?php

namespace FrederickOsei\LaravelCountryRegion\Tests\Feature;

use FrederickOsei\LaravelCountryRegion\Models\Country;
use FrederickOsei\LaravelCountryRegion\Models\Region;
use FrederickOsei\LaravelCountryRegion\Tests\TestCase;

class RegionTest extends TestCase
{
    public function test_greater_accra_exists(): void
    {
        $region = Region::find('GH-AA');

        $this->assertNotNull($region);
        $this->assertEquals('Greater Accra', $region->name);
    }

    public function test_region_can_find_country(): void
    {
        $region = Region::find('GH-AA');

        $country = $region->country();

        $this->assertNotNull($country);
        $this->assertEquals('GH', $country->code);
    }

    public function test_country_can_get_regions(): void
    {
        $ghana = Country::find('GH');

        $regions = $ghana->regions()->get();

        $this->assertNotEmpty($regions);
        $this->assertTrue(
            $regions->contains('code', 'GH-AA')
        );
    }
}