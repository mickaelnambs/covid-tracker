@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">COVID-19 Global Data</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Cases</h5>
                    <p class="card-text display-4">{{ number_format($totalCases) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Deaths</h5>
                    <p class="card-text display-4">{{ number_format($totalDeaths) }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Recovered</h5>
                    <p class="card-text display-4">{{ number_format($totalRecovered) }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>@sortablelink('country', 'Country')</th>
                    <th>@sortablelink('cases', 'Total Cases')</th>
                    <th>@sortablelink('deaths', 'Deaths')</th>
                    <th>@sortablelink('recovered', 'Recovered')</th>
                    <th>@sortablelink('active', 'Active Cases')</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($covidData as $data)
                    <tr>
                        <td>
                            <img src="{{ $data->country_flag }}" alt="{{ $data->country }} flag" width="30" class="me-2">
                            {{ $data->country }}
                        </td>
                        <td>{{ number_format($data->cases) }}</td>
                        <td>{{ number_format($data->deaths) }}</td>
                        <td>{{ number_format($data->recovered) }}</td>
                        <td>{{ number_format($data->active) }}</td>
                        <td>
                            <a href="{{ route('covid-data.show', $data->country) }}" class="btn btn-sm btn-primary">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $covidData->links() }}
    </div>
</div>
@endsection
