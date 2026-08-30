<?php

namespace FrederickOsei\LaravelCountryRegion\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use FrederickOsei\LaravelCountryRegion\LaravelCountryRegionServiceProvider;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelCountryRegionServiceProvider::class,
        ];
    }
}