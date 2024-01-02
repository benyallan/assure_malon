<?php

use App\Enums\HotelStatus;
use App\Models\Hotel;
use App\Services\AccessControlService;
use App\Services\HotelService;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

beforeEach(function () {
    $this->accessControlServiceMock = mock(AccessControlService::class);

    Auth::shouldReceive('check')->andReturn(true);
    $this->accessControlServiceMock->shouldReceive('canCreateHotel')->andReturn(true);

    $this->hotelService = new HotelService(app());

    $this->data = [
        'name' => 'Hotel Test',
        'subdomain' => 'hotel_test',
        'description' => 'hotel description',
        'location' => 'hotel location',
        'contact_email' => 'hotel@email.com',
        'contact_phone' => '99 99999 9999',
        'status' => HotelStatus::ACTIVE,
    ];
});

it('creates a hotel', function () {
    $result = $this->hotelService->createHotel($this->data);

    expect($result->name)->toBe('Hotel Test');
    expect($result->subdomain)->toBe('hotel_test');
    expect($result->description)->toBe('hotel description');
    expect($result->location)->toBe('hotel location');
    expect($result->contact_email)->toBe('hotel@email.com');
    expect($result->contact_phone)->toBe('99 99999 9999');
    expect($result->status)->toBe(HotelStatus::ACTIVE);
});

it('show a hotel', function () {
    $hotel = Hotel::factory()->create();

    $result = $this->hotelService->findHotel($hotel->id);

    expect(Arr::except($result->toArray(), ['created_at', 'deleted_at']))->toEqual(Arr::except($hotel->toArray(), ['created_at', 'deleted_at']));
});
