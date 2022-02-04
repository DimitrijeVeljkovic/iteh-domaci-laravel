<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\EmployerControler;
use App\Http\Controllers\TitleControler;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('employees', EmployeeControler::class);
Route::resource('employers', EmployerControler::class);
Route::resource('titles', TitleControler::class);
Route::resource('users', UserController::class)->only(['index','show']);
