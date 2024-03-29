<?php

use App\Enums\HotelStatus;
use App\Models\Hotel;
use App\Services\HotelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

beforeEach(function () {
    $this->hotelService = new HotelService(app());

    $this->data = [
        'name' => 'Hotel Test',
        'subdomain' => 'hotel_test',
        'description' => 'hotel description',
        'location' => 'hotel location',
        'contact_email' => 'hotel@email.com',
        'contact_phone' => '99 99999 9999',
        'status' => HotelStatus::ACTIVE->value,
    ];
});

it('list all hotels', function () {
    Hotel::factory(3)->create();

    $result = $this->hotelService->listHotels();

    expect($result)->toHaveCount(3);

    expect($result)->toBeInstanceOf(Collection::class);

    foreach ($result as $hotel) {
        expect($hotel)->toBeInstanceOf(Hotel::class);
    }
});

it('creates a hotel', function () {
    $result = $this->hotelService->createHotel($this->data);

    expect(Arr::except($result->toArray(), ['id', 'created_at', 'deleted_at', 'updated_at']))
        ->toEqual($this->data);
});

it('show a hotel', function () {
    $hotel = Hotel::factory()->create();

    $result = $this->hotelService->findHotel($hotel->id);

    expect(Arr::except($result->toArray(), ['created_at', 'deleted_at']))->toEqual(Arr::except($hotel->toArray(), ['created_at', 'deleted_at']));
});

it('update a hotel', function () {
    $hotel = Hotel::factory()->create();

    $result = $this->hotelService->updateHotel($hotel, $this->data);

    expect(Arr::except($result->toArray(), ['id', 'created_at', 'deleted_at', 'updated_at']))
        ->toEqual($this->data);
});

it('soft deletes a hotel', function () {
    $hotel = Hotel::factory()->create();

    $this->hotelService->deleteHotel($hotel);

    $this->assertSoftDeleted('hotels', ['id' => $hotel->id]);
});

it('force deletes a hotel', function () {
    $hotel = Hotel::factory()->create();

    $this->hotelService->forceDeleteHotel($hotel);

    $this->assertDatabaseMissing('hotels', ['id' => $hotel->id]);
});
