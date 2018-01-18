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
    return view('index');
});

Auth::routes();

Route::get('/index', 'HomeController@index')->name('index');
Route::resource('index','testconroller');
Route::resource ('search','searchcontroller');
Route::resource('customer','CustomerController');
//Route::get('/customer','patient')->name('customer');
Route::resource('patient','PatientController');
//Route::resource('patientDB','PatientController@store_pat');
Route::resource('caregiver','CaregiverController');
Route::resource('sickness','SicknessController');
Route::resource('display','DisplayController');
Route::resource('sum','Show_sumController');
Route::resource('detail','DetailController');

//Route::get('/home', 'inddex')->name('home');