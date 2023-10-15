<?php

use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // não estou usando
    return view('welcome');
});

Route::get("/expenses/{month}", [ExpensesController::class, 'searchByMonth']);
Route::get("/expenses", [ExpensesController::class, 'searchAllMonth']);
Route::get("/medias", [MediaController::class, 'countMedias']);
