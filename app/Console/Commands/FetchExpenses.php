<?php

namespace App\Console\Commands;

use App\Models\DeputyModel;
use App\Models\ExpensesModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchExpenses extends Command
{
    protected $signature = 'app:fetch-expenses';
    protected $description = 'Command description';

    public function handle()
    {
        $deputies = DeputyModel::all('id');

        foreach ($deputies as $deputy) {
            for ($month = 1; $month <= 12; $month++) {
                $url = "https://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/{$deputy->id}/2019/{$month}?formato=json";
                $response = Http::get($url);

                $payload = json_decode($response->body())->list;

                $sumExpenses = 0;

                if ($response->successful()) {

                    foreach ($payload as $payload) {
                        $sumExpenses += $payload->valor;
                    };

                    ExpensesModel::create([
                        'deputy_id' => $deputy->id,
                        'month' => $month,
                        'value' => $sumExpenses
                    ]);

                    $this->info("deputy expenses {$deputy->id} in month {$month} successfully obtained!");
                    sleep(2);
                } else {
                    $this->error("Failed to fetch expenses {$deputy->id} in month {$month}.");
                }
            }
            sleep(2);
        }
    }
}
