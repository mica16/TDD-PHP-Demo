<?php

namespace UberApp\BusinessLogic\UseCases;

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