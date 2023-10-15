<?php

namespace App\Console\Commands;

use App\Models\DeputyModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchDeputies extends Command
{
    protected $signature = 'app:fetch-deputies';
    protected $description = 'Command description';

    public function handle()
    {
        $url = 'https://dadosabertos.almg.gov.br/ws/legislaturas/19/deputados/em_exercicio?formato=json';

        $response = Http::get($url);

        if ($response->successful()) {
            $list = json_decode($response->body())->list;
            foreach ($list as $elem) {
                $elem = (array) $elem;
                DeputyModel::firstOrCreate(
                    ['id' => $elem['id']],
                    ['nome' => $elem['nome']]
                );
            }
            $this->info('Deputies fetched successfully!');
        } else {
            $this->error('Failed to fetch deputies.');
        }
    }
}
