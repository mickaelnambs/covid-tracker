@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">
            <img src="{{ $countryData->country_flag }}" alt="{{ $countryData->country }} flag" width="50" class="me-2">
            {{ $countryData->country }} COVID-19 Data
        </h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">General Statistics</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Total Cases:</strong> {{ number_format($countryData->cases) }}
                        </li>
                        <li class="list-group-item"><strong>Deaths:</strong> {{ number_format($countryData->deaths) }}</li>
                        <li class="list-group-item"><strong>Recovered:</strong> {{ number_format($countryData->recovered) }}
                        </li>
                        <li class="list-group-item"><strong>Active Cases:</strong> {{ number_format($countryData->active) }}
                        </li>
                        <li class="list-group-item"><strong>Critical Cases:</strong>
                            {{ number_format($countryData->critical) }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Per Million Statistics</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Cases per Million:</strong>
                            {{ number_format($countryData->cases_per_million) }}</li>
                        <li class="list-group-item"><strong>Deaths per Million:</strong>
                            {{ number_format($countryData->deaths_per_million) }}</li>
                        <li class="list-group-item"><strong>Tests per Million:</strong>
                            {{ number_format($countryData->tests_per_million) }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Additional Information</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Continent:</strong> {{ $countryData->continent }}</li>
                <li class="list-group-item"><strong>Population:</strong> {{ number_format($countryData->population) }}</li>
                <li class="list-group-item"><strong>Total Tests:</strong> {{ number_format($countryData->tests) }}</li>
            </ul>
        </div>

        <a href="{{ route('covid-data.index') }}" class="btn btn-primary">Back to All Countries</a>
    </div>
@endsection
