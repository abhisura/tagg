<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::post('/donationrequests', 'DonationRequestController@store')->name('donation');

//Route::resource('/donationrequest', 'DonationRequestController');
Route::resource('donationrequest', 'DonationRequestController');
//Route::post('donationrequest/{orgID}', ['as' => 'donationrequest', 'uses' => 'DonationRequestController@store']); //->name('donation');