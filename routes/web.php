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

//------------------------------------HOME/MIDDLEWARE-------------------------------------------//
																								//
/**																								//
 * @author Lory LETICEE																			//
 */																								//
Route::get('/', 'HomeController@index')->name('home');											//
																								//
/** Obliger de la laisser j'ai remarqué que lapplication l'utilise à des endroits mystiques */	//
Route::get('/home', 'HomeController@index')->name('home');										//
																								//
																								//
Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');						//
Route::get('/about', 'HomeController@cgu');                                                     //
Route::get('/account', 'User\UserController@index')->middleware('auth');                        //
//----------------------------------------------------------------------------------------------//


//-----------------------------------------BOOKING----------------------------------------------//
																								//
Route::post('/booking/create','Booking\BookingController@create')->middleware('auth');			//
																								//
						//---------------------AJAX--------------------------//					//
Route::post('/booking/ajax/store','Booking\AjaxController@store')->middleware('auth');			//
//----------------------------------------------------------------------------------------------//

//-----------------------------------------VEHICLE------------------------------------------------------------------------------------------//
																																			//
Route::post('/vehicle/search','Vehicle\VehicleController@search');																			//
Route::get('/vehicle/search','Vehicle\VehicleController@search');																			//
//------------------------------------------------------------------------------------------------------------------------------------------//

//-------------------------------------ADMIN--------------------------------------------------------//
/**																									//
 * @author Aziza CHEBANI																			//
 */																									//
Route::get('/admin ', 'Admin\AdminController@index')->middleware('admin');							//
Route::get('/admin/booking', 'Admin\Booking\BookingController@show')->middleware('admin');			//
Route::get('/admin/user', 'Admin\User\UserController@show')->middleware('admin');					//
Route::get('/admin/profil', 'Admin\AdminController@show')->middleware('admin');						//																					//
Route::get('/admin/vehicle', 'Admin\Vehicle\VehicleController@show')->middleware('admin');			//
																									//
					//---------------------AJAX--------------------------//							//
																									//
Route::post('/admin/ajax/edit', 'Admin\User\AjaxController@edit')->middleware('admin');				//
Route::post('/admin/user/ajax/edit', 'Admin\User\AjaxController@edit')->middleware('admin');		//
Route::post('/admin/user/ajax/del', 'Admin\User\AjaxController@delete')->middleware('admin');		//
																									//
								//-----Vehicle-------//												//
																									//
Route::post('/admin/vehicle/ajax/edit', 'Admin\Vehicle\AjaxController@edit')->middleware('admin');	//
Route::post('/admin/vehicle/ajax/del', 'Admin\Vehicle\AjaxController@delete')->middleware('admin');	//
Route::post('/admin/vehicle/add', 'Admin\Vehicle\VehicleController@add');											//
																									//
								//-----Booking-------//												//
																									//
																									//
Route::post('/admin/booking/ajax/edit', 'Admin\Booking\AjaxController@edit')->middleware('admin');	//
Route::post('/admin/booking/ajax/del', 'Admin\Booking\AjaxController@delete')->middleware('admin');	//
//--------------------------------------------------------------------------------------------------//


Route::get('store', 'StripeController@store')->middleware('auth');
Route::get('/stripe/index/{price}', 'StripeController@index')->middleware('auth');
Route::post('payment', 'StripeController@payStripe')->middleware('auth');





