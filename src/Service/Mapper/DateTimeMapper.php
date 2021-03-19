<?php

namespace App\Service\Mapper;

use DateTime;

class DateTimeMapper
{
    public function toIso8601String(DateTime $dateTimeObj)
    {
        return $dateTimeObj->format(DateTime::ISO8601);
    }

    public function toDateTime(string $dateTimeString) {
        return DateTime::createFromFormat(DateTime::ISO8601, $dateTimeString);
    }
}