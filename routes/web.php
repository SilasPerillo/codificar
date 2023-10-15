<?php

use App\Http\Controllers\DeputyController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // não estou usando
    return view('welcome');
});

Route::get('/deputies/create-list', [DeputyController::class, 'createList']);

Route::get("/expenses/{month}", [ExpensesController::class, 'searchByMonth']);
Route::get("/expenses", [ExpensesController::class, 'searchAllMonth']);
Route::get("/medias", [MediaController::class, 'countMedias']);
