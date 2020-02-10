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

Route::get('/home', function () {
    return view('User.Index_view');
});


Route::get('/index','User\Main_cont@index')->name('Home');
Route::get('/jobs','User\Main_cont@findJobs')->name('Jobs');
Route::post('/jobs','User\Main_cont@findJobs')->name('Jobs');
