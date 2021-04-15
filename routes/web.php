<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabasesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/GET/TESTING', [DatabasesController::class, 'testing']);

Route::get('api/GET/USER', [DatabasesController::class, 'user']);

Route::get('api/GET/DATABASE', [DatabasesController::class, 'index']);

Route::get('api/CHECK/DATABASE/{id}', [DatabasesController::class, 'show']);

Route::post('api/POST', [DatabasesController::class, 'store']);

Route::put('api/PUT/{id}',[DatabasesController::class, 'update']);

Route::delete('api/DELETE/{id}',[DatabasesController::class, 'destroy']);