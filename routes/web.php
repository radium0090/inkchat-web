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

Route::get('/', 'FrontController@index')->name('toppage');
Route::get('/category/{catid}', 'FrontController@index')->name('top');
Route::get('/top', 'FrontController@index')->name('top');
Route::get('/p/{id}', 'FrontController@detail')->name('detail');
Route::post('/p/{id}', 'FrontController@addcomment')->middleware('auth')->name('addcomment');

Route::get('crop-image', 'ImageController@index');
Route::post('crop-image', ['as'=>'upload.image','uses'=>'ImageController@uploadImage']);

Route::get('/contact', 'ContactController@index')->name('front.contact.index');
Route::post('/contact', 'ContactController@addcontact')->name('front.contact.addcontact');

Route::get('/u/{id}', 'UserfrontController@index')->name('front.userfront.index');

Route::get('/{id}/following', 'UserfrontController@following')->name('front.userfront.following');
Route::get('/{id}/followers', 'UserfrontController@followers')->name('front.userfront.followers');

Route::post('/follow', 'UserfrontController@dofollow')->name('front.userfront.follow');
Route::get('/follow', 'UserfrontController@dofollow')->name('front.userfront.follow');
Route::post('/unfollow', 'UserfrontController@unfollow')->name('front.userfront.unfollow');

Route::post('/posts/{post}/like', 'LikeController@store');
Route::get('/posts/{post}/like', 'LikeController@store');
Route::post('/posts/{post}/unlike', 'LikeController@destroy');


Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});



Auth::routes();

Route::Group(['prefix'=>'mypage','namespace'=>'Mypage','middleware' => 'auth','as' => 'mypage.'],function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/thumbnail', 'HomeController@thumbnail')->name('thumbnail');
    Route::post('/uploadthumbnail','HomeController@uploadThumbnail')->name('uploadthumbnail');

    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::post('/updateprofile','HomeController@updateprofile')->name('updateprofile');

    Route::get('/password', 'HomeController@password')->name('password');
    Route::post('/updatepassword','HomeController@updatepassword')->name('updatepassword');

    Route::resource('/posts', 'PostController');

    Route::get('/likedposts', 'HomeController@likedposts')->name('likedposts');

    Route::get('/getnewfollower', 'HomeController@getNewFollower')->name('getNewFollower');

    Route::get('/shownotifi', 'HomeController@showUserNotifications')->name('showUserNotifications');
});   


Route::Group(['prefix'=>'admin','namespace'=>'Admin','as' => 'admin.'],function(){
        Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('/login', 'Auth\LoginController@login');
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

        Route::group(['middleware' => 'auth:admin'], function() {
            Route::get('/home', 'HomeController@index')->name('home');

            Route::resource('/posts', 'PostController');
            Route::resource('/tags', 'TagController');
            Route::resource('/categories', 'CategoryController');
            Route::resource('/users', 'UserController');
            Route::resource('/contacts', 'ContactController');

            Route::get('/password', 'PasswordController@edit')->name('password');
            Route::post('/updatepassword','PasswordController@update')->name('updatepassword');

            Route::get('/imagekanri', 'HomeController@imagekanri')->name('imagekanri');
        });


});


//他社アプリ提携------------------------------------------------------------
Route::get('/api/junyidasu', 'junyidasu\ApiShopController@junyidasu');
Route::post('/api/junyidasu', 'junyidasu\ApiShopController@junyidasu');

Route::get('/newsmenu', 'RssnewsController@newsmenu')->name('newsmenu');
Route::get('/newssite', 'RssnewsController@newssite')->name('newssite');
Route::get('/newstop', 'RssnewsController@newstop')->name('newstop');
//----------------------------------------------------------------
