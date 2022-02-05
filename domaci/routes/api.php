<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\EmployerControler;
use App\Http\Controllers\TitleControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerEmployeeController;
use App\Http\Controllers\EmployeeTitleController;

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

Route::resource('employees', EmployeeControler::class)->only(['index','store','update', 'destroy']);
Route::resource('employers', EmployerControler::class);
Route::resource('titles', TitleControler::class)->only(['index','store','update','destroy']);
Route::resource('users', UserController::class)->only(['index','show']);
Route::resource('employers/{id}/employees', EmployerEmployeeController::class);
Route::resource('employees/{id}/titles', EmployeeTitleController::class);