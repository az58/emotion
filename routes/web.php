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

//---------------------------------------------------------------------------------------

Route::get('/', 'HomeController@index')->name('home');

/** Obliger de la laisser j'ai remarqué que lapplication l'utilise à des endroits mystiques */
Route::get('/home', 'HomeController@index')->name('home');

//---------------------------------------------------------------------------------------

/**
 * @author Lory LETICEE
 */
Route::get('/logout','Auth\LoginController@logout');

//---------------------------------------------------------------------------------------

Route::get('/booking','Booking\BookingController@index');
Route::get('/booking/create','Booking\BookingController@create');

//---------------------------------------------------------------------------------------

Route::post('/vehicle/search','Vehicle\VehicleController@search');

//-------------------------------------ADMIN--------------------------------------------------

/**
 * @author Aziza CHEBANI
 */
Route::get('/admin ', 'Admin\AdminController@index')->middleware('admin');

Route::get('/admin/booking', 'Admin\Booking\BookingController@show')->middleware('admin');

Route::get('/admin/user', 'Admin\User\UserController@show')->middleware('admin');

Route::get('/admin/vehicle', 'Admin\Vehicle\VehicleController@show')->middleware('admin');

Route::get('/admin/profil', 'Admin\AdminController@show')->middleware('admin');
//---------------------------------------------------------------------------------------


/**
 * @author Aziza CHEBANI
 * Ajax Admin Profile
 */

Route::post('/admin/ajax/edit', 'Admin\User\AjaxController@edit')->middleware('admin');

//---------------------------------------------------------------------------------------

/**
 * @author Kaouther CHEBBI
 */

Route::post('/admin/user/ajax/edit', 'Admin\User\AjaxController@edit')->middleware('admin');
Route::post('/admin/user/ajax/del', 'Admin\User\AjaxController@delete')->middleware('admin');

//---------------------------------------------------------------------------------------

/**
 * @author Kaouther CHEBBI
 */
Route::post('/admin/vehicle/ajax/edit', 'Admin\Vehicle\AjaxController@edit')->middleware('admin');
Route::post('/admin/vehicle/ajax/del', 'Admin\Vehicle\AjaxController@delete')->middleware('admin');

//---------------------------------------------------------------------------------------

Route::post('/admin/booking/ajax/edit', 'Admin\Booking\AjaxController@edit')->middleware('admin');

//---------------------------------------------------------------------------------------