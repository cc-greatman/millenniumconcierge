<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRates;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Fetches the latest currency exchange rates from an external API and updates the database.
     *
     * This method retrieves exchange rates from the ExchangeRate-API service. It parses the response
     * and updates the `CurrencyRates` model in the database with the latest rates. If the API request
     * is successful, a success message is logged to the console. Otherwise, an error message is logged.
     *
     * @return void
     */
    public function handle()
    {
        $apiKey = env('CURRENCY_API_KEY');
        $apiUrl = "https://v6.exchangerate-api.com/v6/".$apiKey."/latest/USD";
        $response = file_get_contents($apiUrl);
        $data = json_decode($response, true);

        if ($data['result'] === 'success') {
            foreach ($data['conversion_rates'] as $symbol => $rate) {
                CurrencyRates::updateOrCreate(
                    ['symbol' => $symbol],
                    ['exchange_rate' => $rate]
                );
            }

            $this->info('Exchange currency rates updated successfully.');
        } else {
            $this->error('Failed to fetch exchange rates.');
        }
    }
}
