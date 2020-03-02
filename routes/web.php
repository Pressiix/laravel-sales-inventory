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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/test',  'AppController@test');
    
    //Route::get('profile',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
    Route::post('users/update', ['as' => 'users.update', 'uses' => 'UserController@update']);
    
    Route::get('request-form', ['as' => 'request-form', 'uses' => 'AppController@request']);
    Route::post('request-save', ['as' => 'request-save', 'uses' => 'AppController@storeRequest']);
    Route::get('pending-list', ['as' => 'request-show', 'uses' => 'AppController@showPendingList']);
    Route::post('request-review', ['as' => 'request-review', 'uses' => 'AppController@review']);
    Route::get('my-activity', 'AppController@showMyActivities');
    Route::get('booking-inventory',  ['as' => 'booking-inventory', 'uses' => 'AppController@booking']);

    Route::get('create-customer', ['as' => 'create-customer', 'uses' => 'CustomerController@createCustomer']);
    Route::post('save-customer', ['as' => 'save-customer', 'uses' => 'CustomerController@storeCustomer']);

    Route::get('create-advertiser', ['as' => 'create-advertiser', 'uses' => 'AdvertiserController@createAdvertiser']);
    Route::post('save-advertiser', ['as' => 'save-advertiser', 'uses' => 'AdvertiserController@storeAdvertiser']);

    //Route::get('revenue/{id}', ['as' => 'revenue', 'uses' => 'AppController@showRevenue']);
    Route::get('campaign-report', ['as' => 'campaign-report', 'uses' => 'AppController@showCampaignReport']);
    Route::get('ad-network', ['as' => 'ad-network', 'uses' => 'AppController@showAdNetwork']);

    Route::post('/upload-image', 'UserController@uploadProfileImage');
    Route::post('/save-booking','AppController@storeBooking');

    Route::get('/test-mail', 'AppController@sendEmail');

    /*new design*/
    Route::get('/profile', 'AppController@profile');
    Route::get('/profile2', 'AppController@profile2');
    Route::get('/profile3', 'AppController@profile3');
    Route::get('/ad_network', 'AppController@ad_network');
    Route::get('/ad_network_bymonth', 'AppController@ad_network_bymonth');
    Route::get('/ad_network_create', 'AppController@ad_network_create');
    Route::get('/booking_inventory', 'AppController@booking_inventory');
    Route::get('/campaign_report', 'AppController@campaign_report');
    Route::get('/campaign_report_create', 'AppController@campaign_report_create');
    Route::get('/campaign_report_preview', 'AppController@campaign_report_preview');
    Route::get('/create_new_customer', 'AppController@create_new_customer');
    Route::get('/forgot', 'AppController@forgot');
    //Route::get('/login', 'AppController@login');
    Route::get('/request_form', ['as' => 'request_form', 'uses' => 'AppController@request']);
    Route::get('/request_preview', 'AppController@request_preview');
    Route::get('/revenue', 'AppController@revenue');
    Route::get('/success', 'AppController@success');
    Route::get('/success_ad_network', 'AppController@success_ad_network');
    Route::get('/success_campaign', 'AppController@success_campaign');
});