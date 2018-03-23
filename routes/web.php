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

Route::get('/index', function () {
    return view('index');
});

// Route::get('/index', 'testconroller@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::prefix('authcare')->group(function() {
  Route::get('/login', 'Auth\LogincaregiverController@showLoginForm')->name('caregiver.logincare');
  Route::post('/login', 'Auth\LogincaregiverController@login')->name('caregiver.logincare.submit');

  Route::get('/dashcaregiver', 'DashcaregiverController@index')->name('caregiver.dashboard');
  Route::resource('/addactivity','AddplanController');
  Route::resource('vitalsign','Vital_signsController');
  Route::resource('/suction','SuctionController');
  Route::resource('/feeding','FeedingController');
  Route::resource('/catheter','CatheterController');
  Route::resource('/colostomy','ColostomyController');
  Route::resource('/sugar','SugarController');
  Route::resource('/otheractivity','OtheractivityController');
  Route::resource('/notediary','NotediaryController');
  Route::resource('/emergency','EmergencyController');

  Route::get('/logout', 'Auth\LogincaregiverController@logout')->name('caregiver.logout');
  // Route::resource('/dashcaregiver','DashcaregiverController');
});

Route::prefix('authcus')->group(function() {
  Route::get('/login', 'Auth\LogincustomerController@showLoginForm')->name('customer.login');
  Route::post('/login', 'Auth\LogincustomerController@login')->name('customer.login.submit');

   Route::get('/dashcustomer', 'DashcustomerController@index')->name('customer.dashboard');
   Route::resource('/cusselect','Cus_select_care_Controller');
  Route::get('/logout', 'Auth\LogincustomerController@logout')->name('customer.logout');
  // Route::resource('/dashcaregiver','DashcaregiverController');
});


Auth::routes();

 Route::get('/', 'HomeController@index');
// Route::resource('index','HomeController');
// Route::resource('/index','testconroller');
Route::resource ('search','searchcontroller');
Route::resource('customer','CustomerController');
//Route::get('/customer','patient')->name('customer');
Route::resource('patient','PatientController');
//Route::resource('patientDB','PatientController@store_pat');
Route::resource('caregiver','CaregiverController');
Route::resource('sickness','SicknessController');
// Route::resource('display','DisplayController');
Route::resource('sum','Show_sumController');
Route::resource('detail','DetailController');
Route::resource('/dash','DisplayController');
Route::resource('updatepat','PatientController');
Route::resource('updatesick','SicknessController');
// Route::resource('cusselect','Cus_select_care_Controller');
Route::resource('usercustomer','UserCusController');
Route::resource('usercaregiver','UserCaregiverController');
// Route::resource('dashcustomer','DashcustomerController');
Route::resource('userplan','UserplanController');
Route::resource('createplan','CreateplanController');
// Route::resource('dashcaregiver','DashcaregiverController');
// Route::resource('addactivity','AddplanController');
// Route::resource('vitalsign','Vital_signsController');
// Route::resource('suction','SuctionController');
// Route::resource('feeding','FeedingController');
// Route::resource('catheter','CatheterController');
// Route::resource('colostomy','ColostomyController');
// Route::resource('sugar','SugarController');
Route::resource('waitselect','WaitselectController');
Route::resource('callemergency','CallEmergencyController');
// Route::resource('otheractivity','OtheractivityController');
// Route::resource('notediary','NotediaryController');
Route::resource('updateuserpat','UserCusController');
Route::resource('','');
// Route::get('/dash',function(){
//   return view('dash');
// });

//Route::get('/home', 'inddex')->name('home');
