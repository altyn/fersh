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

    // Authentication Routes...
    Route::get('/sign_in', 'WebAuthController@showLoginForm');
    Route::post('/logout', 'WebAuthController@logout');
    Route::get('/success', 'UserController@signInSuccess');

    // Registration Routes...
    Route::get('/sign_up', 'WebAuthController@signUpForm')->name('web.register');
    Route::post('/sign_up', 'WebRegisterController@register');

    // Password Reset Routes...
    $this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');


    Route::get('/profile/info', 'UserController@profileInfo')->name('profile.info')->middleware('auth');
});



Route::get('/auth/{provider}/redirect/', 'WebAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback/', 'WebAuthController@handleProviderCallback');

Route::post('/auth/social/', 'WebAuthController@socialSignUp')->name('social.register')->middleware('guest');
