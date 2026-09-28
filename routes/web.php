<?php

use App\Http\Controllers\CriterioBusquedaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('criterios', CriterioBusquedaController::class)
    ->parameters(['criterios' => 'criterioBusqueda']);
