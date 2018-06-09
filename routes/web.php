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
    Route::get('/sign_in', 'UserController@signIn');
    Route::get('/sign_up', 'UserController@signUp');
    Route::get('/success', 'UserController@signInSuccess');
    
});
