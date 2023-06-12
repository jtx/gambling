<?php

namespace App\Enum;

// Get the Earth's diameter in either miles or KM.
enum EarthDiameterEnum: int
{
    case MILES = 3963;
    case KM = 6371;
}
