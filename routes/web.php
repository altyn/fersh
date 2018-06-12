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


Route::name('home')->get('/', function(){
    return redirect('/ru');
});

Route::group(['prefix' => '/{lang}',], function (){

    Route::get('/', 'WebController@index');

    // User manipulation 
    Route::get('/sign_in', 'WebAuthController@showLoginForm');
    Route::get('/sign_up', 'UserController@signUp');
    Route::get('/success', 'UserController@signInSuccess');
    Route::get('/profile/info', 'UserController@profileInfo');

});

Route::get('/auth/social', 'WebAuthController@socialSignUp')->name('auth.social');
Route::get('/auth/{provider}/redirect/', 'WebAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback/', 'WebAuthController@handleProviderCallback');