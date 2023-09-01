<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AntrianTeamController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/login', function () {
    return view('/login');
});

Route::get('/register', function () {
    return view('/register');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/user', function () {
    return view('admin/user/index');
});

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'actionlogin'])->name('actionlogin');

Route::get('home',[HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('actionlogout',[LoginController::class,'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('profile',[HomeController::class,'profile'])->name('profile')->middleware('auth');

// Route::get('/user',[LoginController::class,'userData'])->name('userIndex');
// Route::delete('deleteUser/{id}',[LoginController::class,'deleteUser'])->name('deleteUser');

Route::resource('/users', UserController::class);
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