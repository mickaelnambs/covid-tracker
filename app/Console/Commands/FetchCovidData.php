<?php

namespace App\Console\Commands;

use App\Contracts\Services\CovidDataServiceInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class FetchCovidData extends Command
{
    protected $signature = 'covid:fetch';
    protected $description = 'Fetch latest COVID-19 data from API';

    public function __construct(private CovidDataServiceInterface $covidDataService)
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $this->info('Starting to fetch COVID-19 data...');

        try {
            $updatedCount = $this->covidDataService->fetchAndUpdateData();
            $this->info("COVID-19 data updated successfully. {$updatedCount} records processed.");

            return Command::SUCCESS;
        } catch (\Throwable $th) {
            $this->error("Unexpected error: {$th->getMessage()}");
            Log::error('Unexpected error during COVID data fetch',[
                'error' => $th->getMessage(),
                'trace' => $th->getTraceAsString()]
            );

            return Command::FAILURE;
        }
    }
}
