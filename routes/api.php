<?php

use Illuminate\Http\Request;
use App\Category;
use App\Food;
use App\IsiMateri;
use App\Laundry;
use App\MyBills;
use App\PublicFacility;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::post('/category', 'CategoryController@store');
Route::get('/category', 'CategoryController@index');
Route::get('/category/{table}', 'CategoryController@table');
Route::put('/category/{category}', 'CategoryController@update');
Route::delete('/category/{category}', 'CategoryController@destroy');
Route::post('/food', 'FoodController@store');
Route::get('/food', 'FoodController@index');
Route::get('/food/{food}', 'FoodController@food');
Route::get('/foodcategory/{category}', 'ApiController@food');
Route::put('/food', 'FoodController@update');
Route::delete('/food/{food}', 'FoodController@destroy');
Route::post('/laundry', 'LaundryController@store');
Route::get('/laundry', 'LaundryController@index');
Route::get('/laundry/{laundry}', 'LaundryController@laundry');
Route::put('/laundry/{laundry}', 'LaundryController@update');
Route::delete('/laundry/{laundry}', 'LaundryController@destroy');
Route::post('/bills', 'MyBillsController@store');
Route::get('/paid', 'MyBillsController@paid');
Route::get('/mustpay', 'MyBillsController@mustpay');
Route::put('/bills', 'MyBillsController@update');
Route::delete('/bills/{bills}', 'MyBillsController@destroy');
Route::post('/public', 'PublicFacilityController@store');
Route::get('/public', 'PublicFacilityController@index');
Route::get('/public/{publicfac}', 'PublicFacilityController@publicfac');
Route::get('/publiccategory/{category}', 'ApiController@publicfac');
Route::put('/public/{public}', 'PublicFacilityController@update');
Route::delete('/public/{public}', 'PublicFacilityController@destroy');