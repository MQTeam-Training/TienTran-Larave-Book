<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('book/count','BookController@getAllBook');
/*Route::get('book/add','BookController@create')*/;
Route::apiResource('book', 'BookController')->middleware('auth.jwt');
Route::post('login', 'UserController@login');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'UserController@logout');
    Route::get('users', 'UserController@index');
});
