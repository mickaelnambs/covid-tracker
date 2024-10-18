<?php

namespace App\Services;

use App\Contracts\CovidDataServiceInterface;
use App\Models\CovidData;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CovidDataService implements CovidDataServiceInterface
{
    public function __construct(private string $apiUrl) {}

    public function fetchAndUpdateData(): int
    {
        try {
            $response = Http::timeout(30)->get($this->apiUrl);

            if (!$response->successful()) {
                Log::warning('COVID API request failed', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return 0;
            }

            $countries = $response->json();

            return $this->getCountries($countries);
        } catch (\Throwable $e) {
            Log::error('Error fetching COVID data', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return 0;
        }
    }

    private function getCountries(array $countries): int
    {
        $updatedCount = 0;
        foreach ($countries as $country) {
            $this->updateCountryData($country);
            $updatedCount++;
        }
        
        return $updatedCount;
    }

    private function updateCountryData(array $country): void
    {
        CovidData::updateOrCreate(
            ['country' => $country['country']],
            $this->prepareCountryData($country)
        );
    }

    private function prepareCountryData(array $country): array
    {
        return [
            'cases' => $country['cases'] ?? 0,
            'deaths' => $country['deaths'] ?? 0,
            'recovered' => $country['recovered'] ?? 0,
            'active' => $country['active'] ?? 0,
            'critical' => $country['critical'] ?? 0,
            'cases_per_million' => $country['casesPerOneMillion'] ?? 0,
            'deaths_per_million' => $country['deathsPerOneMillion'] ?? 0,
            'tests' => $country['tests'] ?? 0,
            'tests_per_million' => $country['testsPerOneMillion'] ?? 0,
            'population' => $country['population'] ?? 0,
            'continent' => $country['continent'] ?? 'Unknown',
            'country_iso2' => $country['countryInfo']['iso2'] ?? 'XX',
            'country_flag' => $country['countryInfo']['flag'] ?? 'https://disease.sh/assets/img/flags/unknown.png'
        ];
    }
}
