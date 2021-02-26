<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/driver-register','CustomRegisterLoginController@driverRegister')->name('driver-register');
Route::get('/passanger-register','CustomRegisterLoginController@passangerRegister')->name('passanger-register');

Route::middleware(['auth','active'])->group(function () {
    Route::resource('users','UserController');

    Route::get('transport-passangers','TransportPassangerController@index')->name('transport-passangers');
});