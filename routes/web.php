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

Route::get('unsubscribe', function () {
    return view('welcome');
})->name('unsubscribe');

Auth::routes();
Route::get('/', function(){
	phpinfo();
});

//test
Route::group(['prefix' => 'test'], function () {
    Route::get('index', 'TestController@index');

});

Route::get('/home', 'HomeController@index')->name('home');

//cache
Route::group(['prefix' => 'cache', 'namespace' => 'Cache'], function () {
    Route::get('lock', 'CacheTestcontroller@lock');
    Route::get('index', 'CacheTestcontroller@index');

});

//error
Route::group(['prefix' => 'error'], function () {
    Route::get('handler', 'ErrorTestController@handler');

});

//collect
Route::group(['prefix' => 'collect'], function () {
    Route::get('now', 'CollectTestController@now');

});

//collect
Route::group(['prefix' => 'tree', 'namespace' => 'Tree'], function () {
    Route::get('index', 'PostController@index');

});


//事件
Route::group(['prefix' => 'listen'], function () {
    Route::get('index', 'OrderController@index');

});

