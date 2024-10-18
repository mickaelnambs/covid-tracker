@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">COVID-19 World Map</h1>
        <div id="sigma-container">
            <div id="custom-popup"></div>
        </div>
    </div>
    <script id="map-data" type="application/json">
        @json($mapData)
    </script>
@endsection
