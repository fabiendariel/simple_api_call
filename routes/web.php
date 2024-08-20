<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api_error', function () {
    return view('api_error');
})->name('api_error');

Route::get('/planets', [DataController::class, 'buildDatasFromSource'])->name('api_results');

Route::get('/planets/{id}', [DataController::class, 'buildDatasFromSource'])->name('api_results');
