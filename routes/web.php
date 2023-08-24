<?php

use App\Http\Controllers\AntrianTeamController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/competition', CompetitionController::class);
Route::resource('/tournament',TournamentController::class);
Route::resource('/news',NewsController::class);
Route::resource('/team',TeamController::class);
Route::resource('/antrian',AntrianTeamController::class);
Route::patch('/update-status/{id}', [AntrianTeamController::class,'update'])->name('antrian.ubah');
// Route::get('/team/{id}',[TeamController::class,'index'])->name('team.index');

// Route::prefix('competition')->group(function(){
//     Route::get('/index',[CompetitionController::class,'index']);
//     Route::get('/create',[CompetitionController::class,'create']);
//     Route::post('/store',[CompetitionController::class,'store']);
//     Route::get('/edit/{competition}',[CompetitionController::class,'edit']);
//     Route::post('/update/{comppetition}',[CompetitionController::class,'update']);
//     Route::get('/destroy/{competition}',[CompetitionController::class,'destroy']);
// });