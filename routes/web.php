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
Route::get('/',[
    'uses' => 'ShopController@index',
    'as'=> 'shop.home'
]);
Route::post('shop/search', [
    'uses'=>'ShopController@search',
]);

Route::post('formmulti','ProductsController@multipleStore')->name('formmulti');
Route::post('form','ProductsController@multipleCreate');


Route::get('addToCart/{id}',[
'uses' => 'ShopController@addToCart',
    'as'=> 'shop.addToCart'
]);


Route::group(['middleware'=>'auth','prefix'=>'shop'],function () {
    Route::get('', 'ShopController@index');

});
Route::get('cart','CartController@cart');



Route::group(['middleware'=>'auth','prefix'=>'admin'],function (){
    Route::resource('posts', 'PostsController');
    Route::resource('markas', 'MarkasController');
    Route::resource('sklads', 'SkladsController');
    Route::resource('products', 'ProductsController');
    Route::resource('providers', 'ProvidersController');
    Route::resource('sizes', 'SizesController');
    Route::resource('categories', 'CategoriesController');
        Route::get('/', function () {
            return view('admin/welcome');
        });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
