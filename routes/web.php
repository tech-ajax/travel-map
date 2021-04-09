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
        $places=App\Place::all();
        //店舗一覧ビューで表示
        
        return view('welcome',['places'=>$places,]);
})->name('welcome');

Route::get('/guide', function () {
        return view('guide');})->name('guide');

Route::get('/hash_tags/{id}/places','PlacesController@showByHashTag')->name('hash_tags.places');
Route::get('/places/search','PlacesController@search')->name('search.places');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// // ロールによるアクセス制限
// Route::group(['middleware' => ['auth', 'can:owner']], function (){
    Route::resource('places', 'PlacesController');
// });

// // 全ユーザ 制作中
// Route::group( ['prefix' => 'users','middleware' => ['auth', 'can:user']], function () {
 
//     Route::group(['prefix' => 'places/{id}'], function () {
//         Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
//         Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
//     });
    
// });




// // ここから検討中。
//     Route::group(['prefix' => 'places/{id}'], function () {
//         Route::post('follow', 'UserFollowController@store')->name('user.follow');
//         Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
//         Route::get('followings', 'UsersController@followings')->name('users.followings');
//         Route::get('followers', 'UsersController@followers')->name('users.followers');
//     });



Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');    
     
    });
    
    Route::resource('users', 'UsersController', ['only' => ['show']]);
        
    Route::group(['prefix' => 'places/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
});