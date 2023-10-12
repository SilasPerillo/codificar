<?php

use App\Http\Controllers\DeputyController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { // não estou usando
    return view('welcome');
});
