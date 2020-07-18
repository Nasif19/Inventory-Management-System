<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('login','AuthController@index');
Route::post('login','AuthController@CheckLogin');
Route::get('signup','AuthController@SignupForm');
Route::post('signup','AuthController@Signup');
Route::get('logout','AuthController@Logout');

Route::group(['middleware' => 'CheckAdminLogin'], function ()
{
    Route::resource('adminDashboard','DashboardController');
    Route::resource('user','UserController');
    Route::resource('store','StorageController');
    Route::resource('category','CategoryController');
    Route::resource('brand','BrandController');
    Route::resource('product','ProductController');
    Route::resource('type','TypeController');
    Route::resource('request','ProductRequestController');
});
Route::group(['middleware'=>'CheckUserLogin'],function()
{
    Route::resource('userDashboard','DashboardUserController');
    Route::resource('requisition','ProductRequisitionController');
    Route::get('requisition/editRequest/{id}','ProductRequisitionController@editRequest'); 
});
