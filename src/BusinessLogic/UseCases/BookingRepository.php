<?php

namespace UberApp\BusinessLogic\UseCases;

interface BookingRepository
{

    public function save(Booking $booking);
}