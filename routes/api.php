<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartamentosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('users', 'store');
    Route::get('users/{id}', 'show')->where('id', '[0-9]+');
    Route::put('users/{id}', 'update')->where('id', '[0-9]+');
    Route::delete('users/{id}', 'destroy')->where('id', '[0-9]+');
});
Route::controller(DepartamentosController::class)->group(function () {
    Route::get('departaments', 'index');
    Route::get('departaments/{id}', 'show')->where('id', '[0-9]+');
});