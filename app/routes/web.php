<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
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


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::resource('admin', 'AdminController');

Route::get('admin1', 'AdminController@adminuser')->name('admin.user');
Route::get('admin2', 'AdminController@adminitem')->name('admin.item');
Route::get('admin3', 'AdminController@adminuserlist')->name('admin.userlist');
Route::get('admin4', 'AdminController@adminsales')->name('admin.sales');
Route::get('admin5', 'AdminController@admininformation')->name('admin.information');
Route::get('/product/{id}', 'ProductController@productdetail')->name('product.detail');
Route::get('search', 'ProductController@search')->name('search.add');


//ログイン中のユーザーのみアクセス可能
Route::group(['middleware' => ['auth']], function () {
    //「ajaxlike.jsファイルのurl:'ルーティング'」に書くものと合わせる。
    Route::post('ajaxlike', 'ProductController@ajaxlike')->name('product.ajaxlike');

});



//ユーザー
Route::group(['middleware' => 'auth', 'can:user-higher'], function () {
    // Route::resource('/','UserController');
    Route::resource('account', 'AccountController');
    Route::resource('users', 'UserController');
    // Route::resource('account', 'AccountController');
    Route::resource('information', 'InformationController');
    Route::resource('order', 'OrderController');
    Route::resource('like', 'likeController');
    Route::resource('faq', 'FaqController');
    //カート全削除
    Route::get('/cart/reset', 'CartController@reset');
    //アイテム1つ削除
    Route::get('/cart/remove/{rowId}', 'CartController@remove')->name('cart.destroy');
    Route::get('/productToCart/{product_id}', 'CartController@productToCart')->name('cart.add');
    Route::get('/cart', 'CartController@ToCart')->name('cart.show');
    Route::post('/', 'ProductController@index')->name('product.index');
    Route::get('cart1', 'ProductController@cartstore')->name('cart.comp');

});

// 管理者以上

Route::group(['middleware' => 'auth', 'can:admin-higher'], function () {

    Route::resource('users', 'UserController');
    Route::resource('account', 'AccountController');
    Route::resource('information', 'InformationController');
    Route::resource('product', 'ProductController');
});


