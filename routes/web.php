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

Route::get('/job-details','User\Main_cont@jobDetails')->name('Jobs.details');
Route::get('/job-filter','User\Main_cont@filterJobs')->name('Jobs.filter');

Route::get('/login','User\User_cont@login')->name('Login');
Route::post('/login','User\User_cont@login')->name('Login');
Route::get('/register','User\User_cont@register')->name('Register');
Route::post('/register','User\User_cont@register')->name('Register');
Route::get('/logout','User\User_cont@logout')->name('Logout');

Route::get('/postjob','User\Company\Main_cont@postJob')->name('PostJob')->middleware('EmployerLogin');

Route::get('/check-login','User\User_cont@isLogged');


