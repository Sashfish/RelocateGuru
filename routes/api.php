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

//Route::post('/login', 'API\APIController@login')->name('login.api');
//Route::post('/register', 'API\APIController@register')->name('register.api');
Route::group(['middleware' => 'auth:api'], function(){
//Route::post('/details', 'API\APIController@details');
//Route::get('/logout', 'API\APIController@logout')->name('logout');

});
});
