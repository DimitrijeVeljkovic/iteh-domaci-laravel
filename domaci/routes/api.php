<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControler;
use App\Http\Controllers\EmployerControler;
use App\Http\Controllers\TitleControler;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployerEmployeeController;
use App\Http\Controllers\EmployeeTitleController;
use App\Http\Controllers\API\AuthController;

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

Route::post('login', [AuthController::class, 'login']);
Route::resource('employees', EmployeeControler::class)->only(['index', 'show']);
Route::resource('employers', EmployerControler::class)->only(['index', 'show']);
Route::resource('titles', TitleControler::class)->only(['index','show']);
Route::resource('users', UserController::class)->only(['index','show']);
Route::resource('employers/{id}/employees', EmployerEmployeeController::class);
Route::resource('employees/{id}/titles', EmployeeTitleController::class);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('employees', EmployeeControler::class)->only(['store', 'destroy', 'update']);
    Route::resource('titles', TitleControler::class)->only(['store', 'destroy', 'update']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/register', [AuthController::class, 'register']);
});