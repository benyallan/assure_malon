<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

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

    function listHotels() : Collection {
        $this->accessControl->canListHotels();

        return Hotel::all();
    }

    public function updateHotel(Hotel $hotel, array $data): Hotel
    {
        $this->accessControl->canUpdateHotel();

        $hotel->update($data);

        return $hotel;
    }

    public function deleteHotel(Hotel $hotel): void
    {
        $this->accessControl->canDeleteHotel();

        $hotel->delete();
    }

    public function forceDeleteHotel(Hotel $hotel): void
    {
        $this->accessControl->canForceDeleteHotel();

        $hotel->forceDelete();
    }
}
