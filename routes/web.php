<?php
use App\Events\PublicMessageEvent;

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


// 通知
Route::group(['prefix' => 'notifiable'], function () {
	// 单个发送
    Route::get('index', 'NotifiableController@index');
    // 多个发送
    Route::get('allUser', 'NotifiableController@allUser');
    // 按需通知
    Route::get('route', 'NotifiableController@route');
    Route::get('routeUser/{mail?}', 'NotifiableController@routeUser')->name('mail');
    // 数据库通知
    Route::get('dataNoti','NotifiableController@datebaseNotifiable');
    Route::get('unDataNoti','NotifiableController@unDatabaseNotifiable');

});


Route::get('message/index', 'MessageController@index');
Route::get('message/send', 'MessageController@send');

Route::get('/echo', function () {
    return view('echo');
 });

Route::get('/push/{message}', function ($message) {
    broadcast(new PublicMessageEvent($message));
    dd('SUCCESS');
});