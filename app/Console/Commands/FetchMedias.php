<?php

namespace App\Console\Commands;

use App\Models\MediaModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchMedias extends Command
{
    protected $signature = 'app:fetch-medias';
    protected $description = 'Command description';

    public function handle()
    {

        $url = "http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json";
        $response = Http::get($url);
        $decoded = json_decode($response->body(), true);

        if ($response->successful()) {
            foreach ($decoded['list'] as $item) {
                $redesSociais = $item['redesSociais'] ?? [];
                foreach ($redesSociais as $redeSocial) {
                    $nome = $redeSocial['redeSocial']['nome'];
                    MediaModel::create(['media' => $nome]);
                }
            }
            $this->info('Medias fetched successfully!');
        } else {
            $this->error('Failed to fetch medias.');
        }
    }
}
