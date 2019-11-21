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

Route::get('/', function () {
    return view('index');
});

Route::get('/top', 'FrontController@index')->name('top');
Route::get('/p/{id}', 'FrontController@detail')->name('detail');
Route::post('/p/{id}', 'FrontController@addcomment')->name('addcomment');

Route::get('crop-image', 'ImageController@index');
Route::post('crop-image', ['as'=>'upload.image','uses'=>'ImageController@uploadImage']);

Auth::routes();

Route::get('/mypage/home', 'HomeController@index')->name('mypagehome');

Route::Group(['prefix'=>'admin','namespace'=>'Admin','as' => 'admin.'],function(){
        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        Route::group(['middleware' => 'auth:admin'], function() {
            Route::get('/home', 'HomeController@index')->name('home');

            Route::resource('/posts', 'PostController');
            Route::resource('/tags', 'TagController');
            Route::resource('/categories', 'CategoryController');

            Route::get('/imagekanri', 'HomeController@imagekanri')->name('imagekanri');
        });


});


Route::get('/api/junyidasu', 'junyidasu\ApiShopController@junyidasu');
Route::post('/api/junyidasu', 'junyidasu\ApiShopController@junyidasu');
