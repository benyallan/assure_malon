<?php

namespace App\Services;

use App\Models\Hotel;
use Illuminate\Database\Eloquent\Collection;

class HotelService
{
    public function createHotel(array $data): Hotel
    {
        return Hotel::create($data);
    }

    public function findHotel(string $id): Hotel
    {
        return Hotel::findOrFail($id);
    }

    public function listHotels(): Collection
    {
        return Hotel::all();
    }

    public function updateHotel(Hotel $hotel, array $data): Hotel
    {
        $hotel->update($data);

        return $hotel;
    }

    public function deleteHotel(Hotel $hotel): void
    {
        $hotel->delete();
    }

    public function forceDeleteHotel(Hotel $hotel): void
    {
        $hotel->forceDelete();
    }
}
