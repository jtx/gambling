<?php

namespace App\Http\Controllers;

use App\Enum\EarthDiameterEnum;
use App\Services\GreatCircleService;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends BaseController
{
    // Could these 2 const's be in .env or config? Sure. But that's why we have code review!
    protected const AFFILIATE_DEFAULT_LIST = 'affiliates.txt';
    protected const AFFILIATE_DEFAULT_MAX_DISTANCE = 100;

    public function index(): Response
    {
        $originLat = config('affiliate.originLat');
        $originLon = config('affiliate.originLon');

        $inviteList = [];

        /**
         * This could very well be a method in our service layer, but I don't think I should over-engineer this
         * based on the criteria.
         */

        $handle = Storage::readStream(self::AFFILIATE_DEFAULT_LIST);
        if ($handle) {
            while (($line = fgets($handle, 4096)) !== false) {
                $affiliate = json_decode($line);
                if (is_null($affiliate)) {
                    continue;
                }

                $distance = GreatCircleService::getDistance(
                    EarthDiameterEnum::KM,
                    $originLat,
                    $originLon,
                    $affiliate->latitude,
                    $affiliate->longitude
                );

                if ($distance <= self::AFFILIATE_DEFAULT_MAX_DISTANCE) {
                    $inviteList[$affiliate->affiliate_id] = $affiliate->name;
                }
            }
        }

        ksort($inviteList);

        return Inertia::render('Public/Home', [
            'affiliates' => $inviteList,
        ]);
    }
}
