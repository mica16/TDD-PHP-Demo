<?php

namespace UberApp\BusinessLogic\Models;

use DateTime;

class BookingSnapshot
{

    private string $id;
    private string $departure;
    private string $arrival;
    private int $price;
    private DateTime $occurred_on;

    public function __construct($id, $departure, $arrival, $price, DateTime $occurred_on)
    {
        $this->id = $id;
        $this->departure = $departure;
        $this->arrival = $arrival;
        $this->price = $price;
        $this->occurred_on = $occurred_on;
    }


}