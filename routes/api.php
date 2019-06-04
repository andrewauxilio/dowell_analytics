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
    'user'=> 'API\UserController',
    'newQuoteRequest' => 'API\NewQuoteRequestController',
    'SalesFortnightGBG' => 'API\SalesFortnightGBGController',
    'SalesFortnightNEW' => 'API\SalesFortnightNEWController',
    'SalesFortnightNOW' => 'API\SalesFortnightNOWController',  
    'SalesFortnightSMT' => 'API\SalesFortnightSMTController'        
]);