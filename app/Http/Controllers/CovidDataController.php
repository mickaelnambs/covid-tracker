<?php

namespace App\Http\Controllers;

use App\Models\CovidData;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CovidDataController extends Controller
{
    public function index(Request $request): View
    {
        $sortColumn = $request->get('sort', 'cases');
        $sortDirection = $request->get('direction', 'desc');

        $covidData = CovidData::orderBy($sortColumn, $sortDirection)
            ->paginate(15)
            ->withQueryString();

        $totalCases = CovidData::sum('cases');
        $totalDeaths = CovidData::sum('deaths');
        $totalRecovered = CovidData::sum('recovered');

        return view('covid-data.index', compact('covidData', 'sortColumn', 'sortDirection', 'totalCases', 'totalDeaths', 'totalRecovered'));
    }
}
