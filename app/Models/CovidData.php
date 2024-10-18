<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CovidData extends Model
{
    protected $fillable = [
        'country', 'cases', 'deaths', 'recovered', 'active',
        'critical', 'cases_per_million', 'deaths_per_million',
        'tests', 'tests_per_million', 'population', 'continent',
        'country_iso2', 'country_flag', 'latitude', 'longitude'
    ];

    protected $casts = [
        'latitude' => 'float',
        'longitude' => 'float',
    ];
}
