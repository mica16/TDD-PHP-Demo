<?php

namespace UberApp\Tests;


use DateTime;
use UberApp\BusinessLogic\UseCases\Booking;
use UberApp\BusinessLogic\UseCases\BookingSnapshot;
use UberApp\BusinessLogic\UseCases\BookUber;
use UberApp\BusinessLogic\UseCases\DeterministicDateProvider;
use UberApp\BusinessLogic\UseCases\InMemoryBookingRepository;

beforeEach(function () {
    $this->bookUberRepository = new InMemoryBookingRepository();
    $this->dateProvider = new DeterministicDateProvider();
    $this->dateProvider->setDateOfNow(new DateTime('2021-01-01 09:10:03'));
});

// Here's a test that is executed three times, one for each 'with' entry below.
// It allows to avoid repeating boilerplate with distinct tests.

it('should book an Uber with the appropriate price', function ($departure, $arrival, $expectedPrice) {
    bookUber($this, $departure, $arrival);
    expectBookings($this, $departure, $arrival, $expectedPrice);
})->with([
    ['3 rue Victor Hugo Aubervilliers', '4 avenue Foch Paris', 0],
    ['5 rue de Courcelles Paris', '4 avenue Foch Paris', 30],
    ['5 rue de Courcelles Paris', '3 rue Victor Hugo Aubervilliers', 50],
]);

function bookUber($self, $departure, $arrival): void
{
    (new BookUber($self->bookUberRepository,
        $self->dateProvider))->handle(
        '123abc',
        $departure,
        $arrival
    );
}

function expectBookings($self, $expectedDeparture, $expectedArrival, $expectedPrice): void
{
    expect(takeSnapshots($self->bookUberRepository->getBookings()))->
    toEqual([new BookingSnapshot(
        "123abc", $expectedDeparture,
        $expectedArrival, $expectedPrice, new DateTime('2021-01-01 09:10:03'))
    ]);
}

function takeSnapshots(array $bookings): array
{
    return array_map(function (Booking $booking) {
        return $booking->takeSnapshot();
    }, $bookings);
}
