<?php

namespace App\Services;

use App\Enum\EarthDiameterEnum;

class GreatCircleService
{
    /**
     * @param EarthDiameterEnum $diameter
     * @param float $originLat
     * @param float $originLon
     * @param float $destLat
     * @param float $destLon
     * @return float
     */
    public static function getDistance(
        EarthDiameterEnum $diameter,
        float $originLat,
        float $originLon,
        float $destLat,
        float $destLon
    ): float {
        $originLat = deg2rad($originLat);
        $originLon = deg2rad($originLon);
        $destLat = deg2rad($destLat);
        $destLon = deg2rad($destLon);

        $deltaLat = $destLat - $originLat;
        $deltaLon = $destLon - $originLon;

        // http://en.wikipedia.org/wiki/Great-circle_distance
        // Find the Great Circle distance
        $temp = pow(sin($deltaLat / 2.0), 2) + cos($originLat) * cos($destLat) * pow(sin($deltaLon / 2.0), 2);

        return $diameter->value * 2 * atan2(sqrt($temp), sqrt(1 - $temp));
    }
}
