<?php

$countries = require __DIR__ . '/../resources/data/countries.php';
$regions = require __DIR__ . '/../resources/data/regions.php';

$countryCodes = array_column($countries, 'code');

$errors = [];

foreach ($countries as $country) {
    foreach ([
        'code',
        'code_3',
        'numeric_code',
        'name',
    ] as $field) {
        if (! array_key_exists($field, $country)) {
            $errors[] = "Country missing field: {$field}";
        }
    }
}

foreach ($regions as $region) {
    foreach ([
        'country_code',
        'code',
        'name',
        'type',
    ] as $field) {
        if (! array_key_exists($field, $region)) {
            $errors[] = "Region {$region['code']} missing field: {$field}";
        }
    }

    if (
        isset($region['country_code']) &&
        ! in_array($region['country_code'], $countryCodes, true)
    ) {
        $errors[] = sprintf(
            'Region %s references unknown country %s',
            $region['code'],
            $region['country_code']
        );
    }
}

if ($errors !== []) {
    foreach ($errors as $error) {
        echo "ERROR: {$error}" . PHP_EOL;
    }

    exit(1);
}

echo 'Country and region data is valid.' . PHP_EOL;
echo 'Countries: ' . count($countries) . PHP_EOL;
echo 'Regions: ' . count($regions) . PHP_EOL;