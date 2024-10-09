<?php

namespace App\Console\Commands;

use App\Components\DataSource\Currencies\CurrencyDataProviderInterface;
use App\Models\Currency;
use Illuminate\Console\Command;

class ImportCurrencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-currencies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected CurrencyDataProviderInterface $dataProvider;

    public function __construct(CurrencyDataProviderInterface $dataProvider)
    {
        parent::__construct();
        $this->dataProvider = $dataProvider;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currencies = $this->dataProvider->get();
        foreach ($currencies as $currency)
        {
            $model = Currency::firstOrCreate([
                "symbol" => $currency["symbol"]
            ], [
                "coin_id" => $currency["id"],
                "name" => $currency["name"],
                "current_price" => $currency["current_price"],
                "price_change_percentage_24h" => $currency["price_change_percentage_24h"],
                "image_url" => $currency["image"],
                "market_cap" => $currency["market_cap"],
            ]);
        }

        $this->info("Currencies imported successfully");
    }
}
