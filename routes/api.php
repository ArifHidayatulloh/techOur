<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CompetitionApiController;
use App\Http\Controllers\Api\NewsApiController;
use App\Http\Controllers\Api\TeamApiController;
use App\Http\Controllers\Api\TournamentApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class,'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class,'me']);
Route::middleware('auth:sanctum')->put('/profile',[AuthController::class,'updateProfile']);
Route::middleware('auth:sanctum')->put('/password',[AuthController::class,'updatePassword']);

Route::get('/competition',[CompetitionApiController::class,'index']);
Route::get('/competition/{id}',[CompetitionApiController::class,'tournamentList']);

Route::get('/tournament/{id}',[TournamentApiController::class,'show']);
Route::get('/team/{id}',[TournamentApiController::class,'teamList']);

Route::post('/team', [TeamApiController::class,'store'])->middleware('auth:sanctum');


Route::get('/news',[NewsApiController::class,'index']);
Route::get('/news/{id}',[NewsApiController::class,'show']);
