<?php
use Illuminate\Support\Facades\Auth;
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
    'register' => false
]);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/forgot', 'AppController@forgot');



Route::group(['middleware' => ['auth']], function () {
    //default
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
    Route::get('/test',  'AppController@test');
    Route::get('/profile', 'AppController@profile');
    Route::get('/profile2', 'AppController@profile2');
    Route::get('/profile3', ['as' => '/profile3', 'uses' => 'AppController@profile3']);
    Route::post('/users/update','UserController@update');
    Route::post('/upload-image', 'UserController@uploadProfileImage');
    
    //BACKEND INSTALL => CREATE DEV / CREATE USER ROLES AND PERMISSIONS
    Route::get('/backend/install', 'DevController@createRoleAndPermission');

    Route::group(['middleware' => ['permission:manage user']], function () {
        //Route::get('/backend/test-mail', 'DevController@sendEmail');
        Route::post('/backend/role-assign', 'DevController@assignRoleToUser');
        
        Route::get('/backend/roles-display', 'DevController@showAllRole');
        Route::get('/backend/permissions-display', 'DevController@showAllPermission');

        Route::get('/backend/users-display','DevController@showAllUser');
        Route::post('/backend/users-find','DevController@findUser');
        Route::get('/backend/users-destroy/{id}','UserController@destroyUserById');
        Route::get('/backend/role-display/{id}', 'DevController@showRole');
        //Route::get('/backend/permission-display/{id}', 'DevController@showPermission');
    });
       
    Route::group(['middleware' => ['permission:create request|edit request']], function () {
        Route::group(['middleware' => ['role:sale|admin']], function () {
            Route::get('/request_form', ['as' => 'request_form', 'uses' => 'RequestFormController@request']);
        });
        Route::post('/request_preview', ['as' => 'request_preview', 'uses' => 'RequestFormController@review']);
        Route::post('/request-save', ['as' => 'request-save', 'uses' => 'RequestFormController@storeRequest']);
       
        Route::get('/request_preview2/{id}','RequestFormController@review2');
    });
       
        //Customer
        Route::get('/create_new_customer', 'CustomerController@createCustomer');
        Route::post('save-customer', ['as' => 'save-customer', 'uses' => 'CustomerController@storeCustomer']);
        //Advertiser
        Route::get('/create_new_advertiser', 'AdvertiserController@createAdvertiser');
        Route::post('save-advertiser', ['as' => 'save-advertiser', 'uses' => 'AdvertiserController@storeAdvertiser']);
        //CAMPAIGN REPORT
        Route::get('/campaign_report', 'CampaignController@campaign_report');
        Route::get('/campaign_report_create', 'CampaignController@campaign_report_create');
        Route::post('/campaign_report_preview', 'CampaignController@campaign_report_preview');
        Route::get('/campaign_report_preview2/{id}', 'CampaignController@campaign_report_preview2');
        Route::get('/campaign_report_download/{id}', [ 'as' => 'campaign_report_download/{id}', 'uses' => 'CampaignController@campaign_download']);
        Route::post('/store_campaign', 'CampaignController@store_campaign');
        Route::get('/campaign_success', 'CampaignController@campaign_success');
        //AD NETWORK
        Route::get('/ad_network', ['as' => '/ad_network', 'uses' => 'AdNetworkController@ad_network']);
        Route::post('/ad_network_bymonth', ['as' => '/ad_network_bymonth', 'uses' => 'AdNetworkController@ad_network_bymonth']);
        Route::post('/ad_network_preview', 'AdNetworkController@ad_network_preview');
        Route::get('/ad_network_create', 'AdNetworkController@ad_network_create');
        Route::post('/ad_network_store', 'AdNetworkController@ad_network_store');

        Route::get('/inventory', 'InventoryController@index');
        Route::post('/inventory-import', 'InventoryController@import');
        
        Route::get('/revenue', ['as' => '/revenue', 'uses' => 'RevenueReportController@index']);
        Route::get('/success', 'AppController@success');
        
   
});