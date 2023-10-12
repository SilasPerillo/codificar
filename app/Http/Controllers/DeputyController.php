<?php

namespace App\Http\Controllers;

use App\Models\DeputyModel;
use stdClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DeputyController extends Controller
{
    public static function createList()
    { // esta rota esta sendo usada apenas para gerar o array de deputados
        $url = 'https://dadosabertos.almg.gov.br/ws/legislaturas/19/deputados/em_exercicio?formato=json';

        $response = Http::get($url);

        $list = json_decode($response->body())->list;
        $newArray = [];

        foreach ($list as $elem) {
            $elem = (array) $elem;
            DeputyModel::firstOrCreate(
                ['id' => $elem['id']],
                ['nome' => $elem['nome']]
            );
        }

        return $newArray;
    }
}
