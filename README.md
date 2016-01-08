# common-measurement

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This package provides classes for modeling and working with measurements and their corresponding units and dimensions.

## Install

Via composer:

``` bash
$ composer require binsoul/common-measurement
```

## Usage

Output a length in metres.

``` php
<?php

use BinSoul\Common\Measurement\Measure;
use BinSoul\Common\Measurement\Measure\LengthMeasure;
use BinSoul\Common\Measurement\SystemOfUnits\StandardUnits;
use BinSoul\Common\Measurement\SystemOfUnits\USCustomaryUnits;

include 'vendor/autoload.php';

function output(LengthMeasure $length)
{
    $standardUnits = new StandardUnits();
    $converted = $length->to($standardUnits->METRE);

    echo sprintf(
        "%s %s = %s %s\n",
        $length->getValue(),
        $length->getUnit()->getSymbol(),
        $converted->getValue(),
        $converted->getUnit()->getSymbol()
    );
}

$standardUnits = new StandardUnits();
$usUnits = new USCustomaryUnits($standardUnits);

output(Measure::valueOf(1, $standardUnits->CENTIMETRE)); // 1 cm = 0.01 m
output(Measure::valueOf(1, $standardUnits->KILOMETRE)); // 1 km = 1000 m
output(Measure::valueOf(1, $usUnits->INCH)); // 1 in = 0.0254 m
output(Measure::valueOf(1, $usUnits->MILE)); // 1 mi = 1609.344 m
```

## Testing

``` bash
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/binsoul/common-measurement.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/binsoul/common-measurement.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/binsoul/common-measurement
[link-downloads]: https://packagist.org/packages/binsoul/common-measurement
[link-author]: https://github.com/binsoul
