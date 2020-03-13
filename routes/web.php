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

/*
|--------------------------------------------------------------------------
| Not used
|--------------------------------------------------------------------------
|
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
/--------------------------------------------------------------------------
*/

//Enable or Disable Register Feature
Auth::routes([
    'register' => true
]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/forgot', 'AppController@forgot');



Route::group(['middleware' => ['auth']], function () {
    //default
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/test',  'AppController@test');
    Route::get('/profile', 'AppController@profile');
    //Route::post('/profile/ajax', 'AppController@profileAjax');
    Route::post('/users/update','UserController@update');
    Route::post('/upload-image', 'UserController@uploadProfileImage');

    //Dev
    Route::group(['middleware' => ['isDev']], function(){
        /*Route::get('/create-user', 'role\RoleController@createUser');
        Route::get('/import', 'role\RoleController@import');*/
        Route::get('/test-mail', 'role\DevController@sendEmail');
        Route::get('/test', 'role\DevController@test');
    });

    //General
    Route::group(['middleware' => ['isGeneral']], function(){
        Route::get('/profile2', 'AppController@profile2');
        Route::get('/profile3', 'AppController@profile3');
        
        Route::post('/save-booking','AppController@storeBooking');
        //Route::post('users/update', ['as' => 'users.update', 'uses' => 'UserController@update']);
        
        Route::get('/request_form', ['as' => 'request_form', 'uses' => 'AppController@request']);
        Route::post('/request_preview', ['as' => 'request_preview', 'uses' => 'AppController@review']);
        Route::post('/request-save', ['as' => 'request-save', 'uses' => 'AppController@storeRequest']);

        //Customer
        Route::get('/create_new_customer', 'CustomerController@createCustomer');
        Route::post('save-customer', ['as' => 'save-customer', 'uses' => 'CustomerController@storeCustomer']);
        //Advertiser
        Route::get('/create_new_advertiser', 'AdvertiserController@createAdvertiser');
        Route::post('save-advertiser', ['as' => 'save-advertiser', 'uses' => 'AdvertiserController@storeAdvertiser']);

        Route::get('/ad_network', 'AppController@ad_network');
        Route::get('/ad_network_bymonth', 'AppController@ad_network_bymonth');
        Route::get('/ad_network_create', 'AppController@ad_network_create');
        Route::get('/booking_inventory', 'AppController@booking_inventory');
        Route::get('/campaign_report', 'AppController@campaign_report');
        Route::get('/campaign_report_create', 'AppController@campaign_report_create');
        Route::get('/campaign_report_preview', 'AppController@campaign_report_preview');
        Route::get('/revenue', 'AppController@revenue');
        Route::get('/success', 'AppController@success');
        Route::get('/success_ad_network', 'AppController@success_ad_network');
        Route::get('/success_campaign', 'AppController@success_campaign');
    });
});