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

Route::get('/response-types', 'Api\ResponseTypeController@index');
Route::get('/countries', 'Api\CountryController@index');
Route::get('/web-requests/datatable', 'Api\WebRequestController@datatable');
Route::get('/web-requests/total-stats', 'Api\WebRequestController@getTotalStats');
Route::get('/web-requests/requests-by-country', 'Api\WebRequestController@getRequestsByCountry');
