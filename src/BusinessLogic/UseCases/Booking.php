<?php

namespace UberApp\BusinessLogic\UseCases;

use DateTime;

class Booking
{

    private string $id;
    private string $departure;
    private string $arrival;
    private int $price;
    private DateTime $occurredOn;

    public static function applyBooking($id, $departure, $arrival, $occurred_on): Booking
    {
        return new Booking($id, $departure, $arrival, self::determinePrice($departure, $arrival), $occurred_on);
    }

    private function __construct($id, $departure, $arrival, $price, $occurred_on)
    {

        $this->id = $id;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->price = $price;
        $this->occurredOn = $occurred_on;
    }

    public function takeSnapshot(): BookingSnapshot
    {
        return new BookingSnapshot(
            $this->id,
            $this->departure,
            $this->arrival,
            $this->price,
            $this->occurredOn,
        );
    }

    private static function determinePrice($departure, $arrival): int
    {
        $price = 0;
        if (str_contains($departure, "Paris")) {
            $price = 30;
            if (!str_contains($arrival, "Paris"))
                $price = 50;
        }
        return $price;
    }

}