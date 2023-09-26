<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AntrianTeamController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LimitController;
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

Route::get('/',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'actionlogin'])->name('actionlogin');

Route::get('home',[HomeController::class,'index'])->name('home')->middleware('auth');
Route::get('actionlogout',[LoginController::class,'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('profile',[HomeController::class,'profile'])->name('profile')->middleware('auth');
Route::post('/profile/{id}',[HomeController::class,'editProfile'])->name('profile.edit')->middleware('auth');
Route::post('/password/{id}',[HomeController::class, 'updatePassword'])->name('password.update')->middleware('auth');


// Route::get('/user',[LoginController::class,'userData'])->name('userIndex');
// Route::delete('deleteUser/{id}',[LoginController::class,'deleteUser'])->name('deleteUser');

// Route::post('/news', [NewsController::class,'store'])->name('news.store')->middleware('check_create_limit:news');

Route::resource('/users', UserController::class);
Route::resource('/competition', CompetitionController::class);
Route::resource('/team',TeamController::class);
Route::resource('/antrian',AntrianTeamController::class);


Route::get('/tournament',[TournamentController::class,'index'])->name('tournament.index');
Route::get('/tournament/create',[TournamentController::class,'create'])->name('tournament.create');
Route::post('/tournament',[TournamentController::class,'store'])->name('tournament.store')->middleware(['auth', 'check_data_limit:tournament']);
Route::get('/tournament/show/{tournament}',[TournamentController::class,'show'])->name('tournament.show');
Route::get('/tournament/{tournament}/edit',[TournamentController::class,'edit'])->name('tournament.edit');
Route::post('/tournament/update/{tournament}',[TournamentController::class,'update']);
Route::delete('/tournament/{tournament}',[TournamentController::class,'destroy'])->name('tournament.destroy');

Route::get('/news',[NewsController::class,'index'])->name('news.index');
Route::get('/news/create',[NewsController::class,'create'])->name('news.create');
Route::post('/news',[NewsController::class,'store'])->name('news.store')->middleware(['auth', 'check_data_limit:news']);
Route::get('/news/{news}/edit',[NewsController::class,'edit'])->name('news.edit');
Route::post('/news/update/{news}',[NewsController::class,'update']);
Route::delete('/news/{news}',[NewsController::class,'destroy'])->name('news.destroy');
Route::get('/news/pending',[NewsController::class,'pending'])->name('news.pending');
Route::patch('/news/approved/{id}',[NewsController::class,'approved'])->name('news.approve');

Route::get('/limit',[LimitController::class,'index'])->name('limit.index');
Route::post('/limit/store',[LimitController::class,'store'])->name('limit.store');

Route::patch('/update-status/{id}', [AntrianTeamController::class,'update'])->name('antrian.ubah');

Route::get('/password', function () {
    return view('password');
});

Route::get('/list-paket', function () {
    return view('admin/list-paket/index');
});

Route::get('/create', function () {
    return view('admin/list-paket/create');
});

Route::get('/view', function () {
    return view('admin/user/view');
});