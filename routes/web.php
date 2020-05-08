<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAge;
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
Route::get('foo', function () {
    return 'Hello World';
});
Route::redirect('/here', '/there', 302);
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return  'posts'.$postId .'comments'.$commentId;
});
Route::get('user1/{age}', function ($age) {
    return 'User '.$age;
})->middleware(CheckAge::class);
Route::get('home/{age}', function($age){
    $tientv=['name'=>'tientran','age'=>$age];
    return $tientv;
});
Route::get('tientv', function () {
    return response('Hello World', 200);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

