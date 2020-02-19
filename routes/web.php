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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::post('users/update', ['as' => 'users.update', 'uses' => 'UserController@update']);



    Route::get('request-form', ['as' => 'request-form', 'uses' => 'AppController@request']);
    Route::post('request-save', ['as' => 'request-save', 'uses' => 'AppController@storeRequest']);
    Route::get('pending-list', ['as' => 'request-show', 'uses' => 'AppController@showPendingList']);
    Route::post('request-review', ['as' => 'request-review', 'uses' => 'AppController@review']);
    Route::get('my-activities', 'AppController@showMyActivities');
    Route::get('create-customer', ['as' => 'create-customer', 'uses' => 'AppController@createCustomer']);
    Route::post('save-customer', ['as' => 'save-customer', 'uses' => 'AppController@storeCustomer']);
    Route::get('booking-inventory',  ['as' => 'booking-inventory', 'uses' => 'AppController@booking']);