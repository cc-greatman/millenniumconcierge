<?php

namespace App\Console\Commands;

use App\Services\CurrencyService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class UpdateCurrencyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:update-rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update currency exchange rates';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(CurrencyService $currencyService)
    {
        $rates = $currencyService->getRates();
        Cache::put('currency_rates', $rates, 86400); // Store rates for 24 hours
        $this->info('Currency rates updated successfully.');
    }
}
