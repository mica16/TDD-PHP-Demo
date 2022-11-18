<?php

namespace UberApp\BusinessLogic\Gateways\Repositories;

use UberApp\BusinessLogic\Models\Booking;

interface BookingRepository
{

    public function save(Booking $booking);
}