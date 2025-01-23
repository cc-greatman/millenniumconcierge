<?php

namespace App\Http\Controllers;

use App\Models\CurrencyRates;
use Illuminate\Http\Request;

class CronController extends Controller
{
    /**
     * Update currency rates using ExchangeRate-API.com
     *
     * @return void
     */
    public function handle() {

        $apiUrl = 'https://v6.exchangerate-api.com/v6/YOUR-API-KEY/latest/USD';
        $response = file_get_contents($apiUrl);

        if ($response !== false) {
            $data = json_decode($response, true);

            if (isset($data['result']) && $data['result'] === 'success') {
                foreach ($data['conversion_rates'] as $currencyCode => $rate) {
                    CurrencyRates::updateOrCreate(
                        ['currency_code' => $currencyCode],
                        ['exchange_rate' => $rate]
                    );
                }

                $this->info('Currency rates updated successfully.');
            } else {
                $this->error('Failed to fetch currency rates.');
            }
        } else {
            $this->error('Failed to connect to the API.');
        }
    }
}
