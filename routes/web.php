<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something*/
/**
Route::get('/', function () {
    return view('welcome');
});
 */

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
/** Obliger de la laisser j'ai remarqué que lapplication l'utilise à des endroits mystiques */
Route::get('/home', 'HomeController@index')->name('home');

/**
 * @author Lory LETICEE
 */
Route::get('/logout','Auth\LoginController@logout');
Route::get('/booking','BookingController@index');
Route::get('/booking/create','BookingController@create');
Route::post('/allVehicles','AjaxController@getVehicle');


/**
 * @author Aziza CHEBANI
 */

Route::get('/admin ', function (){
    return view('administrator.dashboard');
})->middleware('admin');

Route::get('/admin/booking','AdminController@showBooking')->middleware('admin');
Route::get('/admin/user','AdminController@ShowUsers')->middleware('admin');
Route::get('/admin/vehicle','AdminController@ShowVehicles')->middleware('admin');

Route::post('/ajaxEditUser','AjaxUserController@editUser')->middleware('admin');

