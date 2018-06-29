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
    Route::get('/sign_in', 'WebAuthController@showLoginForm')->name('web.login');
    Route::post('/logout', 'WebAuthController@logout');


    // Registration Routes...
    Route::get('/sign_up', 'WebAuthController@signUpForm')->name('web.register');
    Route::post('/sign_up', 'WebRegisterController@register')->name('web.register.post');

    Route::group(['prefix' => 'profile',  'middleware' => 'auth'], function(){
        Route::get('/', 'UserController@profile')->name('profile');
        Route::get('/info', 'UserController@profileInfo')->name('profile.info');
    });

    Route::group(['prefix' => 'freelancer',  'middleware' => 'auth'], function(){
        Route::get('/{id}', 'FreelancerController@index');

        Route::group(['prefix' => 'edit'], function(){
            Route::get('/personal', 'FreelancerController@personal');
            Route::get('/contacts', 'FreelancerController@contacts');
            Route::get('/specialization', 'FreelancerController@specialization');
            Route::get('/portfolio', 'FreelancerController@portfolio');
            Route::get('/changepassword', 'FreelancerController@changepassword');
            Route::get('/notifications', 'FreelancerController@notifications');
            Route::get('/accounts', 'FreelancerController@accounts');
        });
    });

    Route::name('updateFreelancer')->post('/freelancer/edit/personal', 'FreelancerController@updateFreelancer');
    Route::name('deleteFreelancerAvatar')->post('/freelancer/edit/deletefreelanceravatar', 'FreelancerController@deleteFreelancerAvatar');
    Route::name('freelancerChangepassword')->post('/freelancer/edit/changepassword', 'FreelancerController@changepasswordPost');
//    Route::get('/profile', 'UserController@profile')->name('profile');
//    Route::get('/profile/info', 'UserController@profileInfo')->name('profile.info');
});

Auth::routes();

Route::post('/profile/info', 'UserController@profileStore')->name('profile.info.post')->middleware('auth');

Route::get('/auth/{provider}/redirect/', 'WebAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback/', 'WebAuthController@handleProviderCallback');