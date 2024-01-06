<?php

namespace App\Enums;

use App\Traits\EnumMethods;

enum HotelStatus: string
{
    use EnumMethods;

    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case PENDING = 'pending';
}
