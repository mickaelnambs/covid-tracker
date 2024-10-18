<?php

namespace App\Repositories;

use App\Contracts\Repositories\CovidDataRepositoryInterface;
use App\Models\CovidData;
use Illuminate\Pagination\LengthAwarePaginator;

class CovidDataRepository extends GenericRepository implements CovidDataRepositoryInterface
{
    public function __construct(CovidData $model)
    {
        parent::__construct($model);
    }

    public function getPaginatedAndSorted(string $sortColumn, string $sortDirection, int $perPage): LengthAwarePaginator
    {
        return $this->model->orderBy($sortColumn, $sortDirection)->paginate($perPage)->withQueryString();
    }

    public function getTotalCases(): int
    {
        return $this->model->sum('cases');
    }

    public function getTotalDeaths(): int
    {
        return $this->model->sum('deaths');
    }

    public function getTotalRecovered(): int
    {
        return $this->model->sum('recovered');
    }

    public function getMapData(): array
    {
        return $this->model->select('country', 'cases', 'deaths', 'recovered', 'longitude', 'latitude', 'country_flag')
            ->cursor()
            ->map(function ($country) {
                return [
                    'type' => 'Feature',
                    'properties' => [
                        'name' => $country->country,
                        'cases' => $country->cases,
                        'deaths' => $country->deaths,
                        'recovered' => $country->recovered,
                        'flag' => $country->country_flag,
                    ],
                    'geometry' => [
                        'type' => 'Point',
                        'coordinates' => [$country->longitude, $country->latitude]
                    ]
                ];
            })->values()->all();
    }
}
