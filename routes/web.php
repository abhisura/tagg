<?php
//use \App\Role;
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
    /*$member = Role::create(['name' => 'member']);
    $admin = Role::create(['name' => 'administrator']);
    $owner = Role::create(['name' => 'owner']);*/
});
