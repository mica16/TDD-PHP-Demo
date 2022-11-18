<?php

namespace UberApp\BusinessLogic\UseCases;

use UberApp\BusinessLogic\Gateways\Repositories\BookingRepository;
use UberApp\BusinessLogic\Models\Booking;
use UberApp\BusinessLogic\Models\DateProvider;

class BookUber
{

    private BookingRepository $bookingRepository;
    private DateProvider $dateProvider;

    public function __construct(BookingRepository $bookingRepository,
                                DateProvider      $dateProvider)
    {
        $this->bookingRepository = $bookingRepository;
        $this->dateProvider = $dateProvider;
    }

    public function handle(string $bookingId, string $departure, string $arrival): void
    {
        $booking = Booking::applyBooking(
            $bookingId, $departure, $arrival,
            $this->dateProvider->now());
        $this->bookingRepository->save($booking);
    }


}