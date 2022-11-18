<?php

namespace UberApp\Adapters\Secondary\Gateways\Repositories;

use UberApp\BusinessLogic\Gateways\Repositories\BookingRepository;
use UberApp\BusinessLogic\Models\Booking;

class InMemoryBookingRepository implements BookingRepository
{

    private array $bookings = [];

    public function save(Booking $booking)
    {
        $this->bookings[] = $booking;
    }

    public function getBookings(): array
    {
        return $this->bookings;
    }

}