<?php

namespace App\Http\Controllers;

use App\Contracts\Repositories\CovidDataRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CovidDataController extends Controller
{
    public function __construct(private CovidDataRepositoryInterface $covidDataRepository) {}

    public function index(Request $request): View
    {
        $sortColumn = $request->get('sort', 'cases');
        $sortDirection = $request->get('direction', 'desc');
        $covidData = $this->covidDataRepository->getPaginatedAndSorted($sortColumn, $sortDirection, 15);

        $totalCases = $this->covidDataRepository->getTotalCases();
        $totalDeaths = $this->covidDataRepository->getTotalDeaths();
        $totalRecovered = $this->covidDataRepository->getTotalRecovered();

        return view('covid-data.index', compact('covidData', 'sortColumn', 'sortDirection', 'totalCases', 'totalDeaths', 'totalRecovered'));
    }

    public function show(string $country): View
    {
        $countryData = $this->covidDataRepository->where('country', '=', $country)->firstOrFail();

        return view('covid-data.show', compact('countryData'));
    }

    public function worldMap(): View
    {
        $mapData = $this->covidDataRepository->getMapData();

        return view('covid-data.world-map', ['mapData' => $mapData]);
    }
}
