<?php

namespace Deg540\PHPTestingBoilerplate;

class DateManager
{
    public function getCurrentHour(): int
    {
        return date("H");
    }
}