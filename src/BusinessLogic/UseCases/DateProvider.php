<?php

namespace UberApp\BusinessLogic\UseCases;

use DateTime;

interface DateProvider
{
    function now(): DateTime;

}