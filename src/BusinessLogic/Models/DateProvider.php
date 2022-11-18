<?php

namespace UberApp\BusinessLogic\Models;

use DateTime;

interface DateProvider
{
    function now(): DateTime;

}