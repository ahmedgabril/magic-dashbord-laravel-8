<?php

use App\Http\Livewire\Getrole;
use App\Http\Livewire\Getuser;
use App\Http\Livewire\Home;
use App\Http\Livewire\Login;
use Illuminate\Support\Facades\Auth;
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
/*
Route::get('/', function () {
    return view('auth/login');
});
*/

Route::get('/',login::class)->name('login')->middleware('guest');
Route::group(['middelware'=>['auth']],function () {


    Route::get('/home',Home::class)->name('home');
    Route::get('/roles',Getrole::class)->name('role');
    Route::get('/user',Getuser::class)->name('getuser');

    });


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




