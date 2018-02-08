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
Route::resource('/dash','DisplayController');
Route::resource('updatepat','PatientController');
Route::resource('updatesick','SicknessController');
Route::resource('cusselect','Cus_select_care_Controller');
Route::resource('usercustomer','UserCaregiverController');
Route::resource('usercaregiver','UserCusController');
Route::resource('dashcustomer','DashcustomerController');
Route::resource('userplan','UserplanController');
Route::resource('createplan','CreateplanController');
Route::resource('dashcaregiver','DashcaregiverController');
Route::resource('addactivity','AddplanController');
Route::resource('vitalsign','Vital_signsController');
Route::resource('suction','SuctionController');
Route::resource('feeding','FeedingController');
Route::resource('catheter','CatheterController');
Route::resource('colostomy','ColostomyController');
Route::resource('sugar','SugarController');
Route::resource('','');
// Route::get('/dash',function(){
//   return view('dash');
// });

//Route::get('/home', 'inddex')->name('home');
