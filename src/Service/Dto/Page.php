<?php

namespace App\Service\Dto;

class Page
{
    private $size;
    private $totalElements;
    private $totalPages;
    private $number;

    public function __construct(int $size, int $totalElements, int $totalPages, int $number)
    {
        $this->size = $size;
        $this->totalElements = $totalElements;
        $this->totalPages = $totalPages;
        $this->number = $number;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}