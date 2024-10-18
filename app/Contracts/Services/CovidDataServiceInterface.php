<?php

namespace App\Contracts\Services;

interface CovidDataServiceInterface
{
    public function fetchAndUpdateData(): int;
}
