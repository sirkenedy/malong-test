<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\API\v1\Auth\LoginController;
use App\Http\controllers\API\v1\Auth\RegisterController;
use App\Http\controllers\API\v1\JobController;
use App\Http\controllers\API\v1\UserController;
use App\Http\controllers\API\v1\ApplicationController;

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

Route::post('/login', LoginController::class);
Route::post('/register', RegisterController::class);


Route::get('/business/dashboard', UserController::class);
Route::get('jobs/search', [JobController::class, 'searchJob']);
Route::post('jobs/apply', ApplicationController::class);
Route::apiResource('jobs', JobController::class);
