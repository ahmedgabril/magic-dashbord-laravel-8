<?php

//use App\Http\Livewire\Dashbord;

use App\Http\Livewire\Backend;
use App\Http\Livewire\Login;
use App\Http\Livewire\Getrole;
use App\Http\Livewire\Getstting;
use App\Http\Livewire\Getuser;
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
Auth::routes();

Route::get('/',login::class)->name('login')->middleware('guest');
Route::get('/login',login::class)->name('login')->middleware('guest');

Route::get('/backend',Backend::class)->name('backend')->middleware(['auth','permission:الصفحه الرئيسه']);
Route::group(['middleware' =>['auth','permission:المستخدمين والصلاحيات اداره المستخدمين']],function () {


    Route::get('/user',Getuser::class)->name('getuser');

    });
    Route::group(['middleware' =>['auth','permission:المستخدمين والصلاحيات الوظائف']],function () {


        Route::get('/roles',Getrole::class)->name('role');


        });
        Route::group(['middleware' =>['auth','permission: الاعدادت الاعدادت العامه']],function () {


            Route::get('/setting',Getstting::class)->name('setting');


            });
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




