<?php

namespace App\Services;

use App\Models\Hotel;

class HotelService
{
    private AccessControlService $accessControl;

    public function __construct() {
        $this->accessControl = new AccessControlService();
    }

    public function createHotel(array $data): Hotel
    {
        $this->accessControl->canCreateHotel();

        return Hotel::create($data);
    }

    function findHotel(string $id) : Hotel {
        $this->accessControl->canShowHotel();

        return Hotel::findOrFail($id);
    }
}
