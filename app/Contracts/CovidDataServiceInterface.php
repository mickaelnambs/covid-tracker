<?php

namespace App\Contracts;

interface CovidDataServiceInterface
{
    public function fetchAndUpdateData(): int;
}
