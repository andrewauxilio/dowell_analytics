<?php

use Illuminate\Http\Request;

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

Route::apiResources([
    'user' => 'API\UserController',
]);

//Messenger
Route::get('contacts', 'API\ContactsController@get');
Route::get('conversation/{id}', 'API\ContactsController@getMessagesFor');
Route::post('conversation/send', 'API\ContactsController@sendMessage');

//Profile
Route::get('profile', 'API\UserController@profile');
Route::put('profile', 'API\UserController@updateProfile');

//Sales
Route::get('NATSales', 'API\SalesController@getNATSales');
Route::get('QLDSales', 'API\SalesController@getQLDSales');
Route::get('NSWSales', 'API\SalesController@getNSWSales');
Route::get('GBGSales', 'API\SalesController@getGBGSales');
Route::get('NEWSales', 'API\SalesController@getNEWSales');
Route::get('NOWSales', 'API\SalesController@getNOWSales');
Route::get('SMTSales', 'API\SalesController@getSMTSales');

//New Quote Request
Route::get('NATQuoteRequests', 'API\NewQuoteRequestsController@getNATQuoteRequests');
Route::get('NATTotalQuoteRequests', 'API\NewQuoteRequestsController@getNATTotalQuoteRequests');
Route::get('QLDQuoteRequests', 'API\NewQuoteRequestsController@getQLDQuoteRequests');
Route::get('QLDTotalQuoteRequests', 'API\NewQuoteRequestsController@getQLDTotalQuoteRequests');
Route::get('NSWQuoteRequests', 'API\NewQuoteRequestsController@getNSWQuoteRequests');
Route::get('NSWTotalQuoteRequests', 'API\NewQuoteRequestsController@getNSWTotalQuoteRequests');