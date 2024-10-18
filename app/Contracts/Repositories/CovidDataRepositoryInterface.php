<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface CovidDataRepositoryInterface extends RepositoryInterface
{
    public function getPaginatedAndSorted(string $sortColumn, string $sortDirection, int $perPage): LengthAwarePaginator;
    public function getTotalCases(): int;
    public function getTotalDeaths(): int;
    public function getTotalRecovered(): int;
    public function getMapData(): array;
}
