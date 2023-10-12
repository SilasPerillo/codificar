<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // não estou usando
    return view('welcome');
});

Route::get('/deputies/create-list', function () { // esta rota esta sendo usada apenas para gerar o array de deputados
    $url = 'https://dadosabertos.almg.gov.br/ws/legislaturas/19/deputados/em_exercicio?formato=json';

    $response = Http::get($url);

    $list = json_decode($response->body())->list;
    $newArray = [];

    foreach ($list as $elem) {
        $aux = new stdClass();
        $aux->id = $elem->id;
        $aux->nome = $elem->nome;
        array_push($newArray, $aux);
    }

    return $newArray;
});
