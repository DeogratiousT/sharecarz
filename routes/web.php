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
    Route::post('transport-passangers/save-location','TransportPassangerController@store')->name('driver-save-location');
    Route::get('transport-passangers/approve','TransportPassangerController@approve')->name('approve-ride');
    Route::get('transport-passangers/reject','TransportPassangerController@reject')->name('reject-ride');
    Route::get('transport-passangers/complete','TransportPassangerController@complete')->name('complete-ride');
    
    Route::get('hire-cars','HireCarController@index')->name('hire-cars');
    Route::get('hire-cars/my-rides','HireCarController@show')->name('hire-cars-my-rides');
    Route::post('hire-cars/save-location','HireCarController@store')->name('passanger-save-location');
    Route::get('hire-cars/save-car','HireCarController@saveCar')->name('passanger-save-car');

    Route::get('hire-cars/{driver}/createpickup','HireCarController@createPickUp')->name('passanger-create-pick-up');
    Route::post('hire-cars/{driver}/savepickup','HireCarController@savePickUp')->name('passanger-save-pick-up');

    Route::post('hire-cars/{driver}/savedestination','HireCarController@saveDestination')->name('passanger-save-destination');
    Route::get('hire-cars/{driver}/createdestination','HireCarController@createDestination')->name('passanger-create-destination');

    Route::resource('ride-requests','RideRequestController');
});