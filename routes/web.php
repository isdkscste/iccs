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
	return view('auth.login');
});

Auth::routes();





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/forgot-password', function()
{
	return view('auth.reset');
});
Route::get('/scientist/generate-pdf/{id}','PDFController@generatePDF')->where('id', '(.*)')->name('generatePDF');
// Route::get('/admin/generate-pdf/{id}','admin\CandidatePDFController@generatePDF')->name('Generate_CandidatePDF');
Route::post('/forgot-password', 'Auth\ForgotPasswordController@resetpassword')->name('forgot-password');

Route::get('/refresh_captcha', 'Auth\LoginController@refreshCaptcha')->name('refresh_captcha');
Route::group(['middleware' => 'preventBack'], function(){
Route::post('/scientist/update-password', 'HomeController@changePassword')->name('update-password');
Route::post('admin/admin-update-password', 'HomeController@changePassword1')->name('admin-update-password');

Route::group(['namespace' => 'scientist','prefix' => 'scientist'], function() {



Route::get('/Application', 'ApplicationController@applicationView');
Route::get('/application_details', 'ApplicationController@applicationView');

Route::post('/applicationSave', 'ApplicationController@applicationSave');
Route::post('/applicationSubmit', 'ApplicationController@applicationSubmit');
Route::get('/application_details1', 'ApplicationController@applicationView1');

  
});
//admin pages 20-11-2020
Route::group(['namespace' => 'admin','prefix' => 'admin'], function() {
Route::get('/Admin-Dashboard', 'AdminController@applicationsView');
Route::get('/view-details/{id}', 'AdminController@getDetails');
Route::get('/application_details/{id}', 'AdminController@applicationView');
Route::get('/generate-pdf1/{id}','AdminPDFController@generatePDF')->name('admin-generatePDF');
Route::get('/generate-pdf/{id}','AdminPDFController@generatePDF');
 });

});

//admin pages 20-11-2020