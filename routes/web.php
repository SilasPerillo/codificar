<?php

use App\Http\Controllers\DeputyController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // não estou usando
    return view('welcome');
});

Route::get('/deputies/create-list', [DeputyController::class, 'createList']);
