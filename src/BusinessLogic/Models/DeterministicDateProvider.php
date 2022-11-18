<?php

namespace UberApp\BusinessLogic\Models;

use DateTime;

class DeterministicDateProvider implements DateProvider
{
    private DateTime $dateOfNow;


    function now(): DateTime
    {
        return $this->dateOfNow;
    }

    public function setDateOfNow(DateTime $dateOfNow)
    {
        $this->dateOfNow = $dateOfNow;
    }


}