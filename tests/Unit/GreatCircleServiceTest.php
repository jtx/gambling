<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\GreatCircleService;
use App\Enum\EarthDiameterEnum;

class GreatCircleServiceTest extends TestCase
{
    // Going to run some really quick tests just based on the results from https://www.nhc.noaa.gov/gccalc.shtml
    // We're going to assume their data is correct. If ours matches theirs, I'm going say the method works.

    public function test_distance_in_km_works_pole()
    {
        $dist = GreatCircleService::getDistance(EarthDiameterEnum::KM, 0, 0, 10, 1);
        $rounded = round($dist);

        $this->assertEquals(1117, $rounded);
    }

    public function test_distance_in_km_works_from_affiliates()
    {
        $dist = GreatCircleService::getDistance(EarthDiameterEnum::KM, 52.986375, -6.043701, 52.833502, -8.522366);
        $rounded = round($dist);

        $this->assertEquals(167, $rounded);
    }

}
