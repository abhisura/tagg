<?php
use \App\Role;
use \App\User;
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

    //User::first()->roles()->attach(1);

    /*$member = Role::create(['name' => 'member']);
    $admin = Role::create(['name' => 'administrator']);
    $owner = Role::create(['name' => 'owner']);*/

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
