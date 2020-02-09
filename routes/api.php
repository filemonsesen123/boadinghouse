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
Route::put('/editcategory/{category}', 'CategoryController@update');
Route::delete('/deletecategory/{category}', 'CategoryController@destroy');
Route::post('/food', 'FoodController@store');
Route::get('/food', 'FoodController@index');
Route::get('/food/{food}', 'FoodController@food');
Route::get('/foodcategory/{category}', 'ApiController@food');
Route::put('/editfood', 'FoodController@update');
Route::delete('/deletefood/{food}', 'FoodController@destroy');
Route::post('/laundry', 'LaundryController@store');
Route::get('/laundry', 'LaundryController@index');
Route::get('/laundry/{laundry}', 'LaundryController@laundry');
Route::put('/editlaundry/{laundry}', 'LaundryController@update');
Route::delete('/deletelaundry/{laundry}', 'LaundryController@destroy');
Route::post('/bills', 'MyBillsController@store');
Route::get('/bills', 'MyBillsController@index');
Route::get('/paid/{paid}', 'MyBillsController@paid');
Route::get('/mustpay/{mustpay}', 'MyBillsController@mustpay');
Route::put('/bills', 'MyBillsController@update');
Route::delete('/deletebills/{bills}', 'MyBillsController@destroy');
Route::post('/public', 'PublicFacilityController@store');
Route::get('/public', 'PublicFacilityController@index');
Route::get('/public/{publicfac}', 'PublicFacilityController@publicfac');
Route::get('/publiccategory/{category}', 'ApiController@publicfac');
Route::put('/editpublic/{public}', 'PublicFacilityController@update');
Route::delete('/deletepublic/{public}', 'PublicFacilityController@destroy');