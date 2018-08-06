<?php

Route::middleware('admin')->group(function(){

	Route::name('bashkaruu.index')->get('/', 'BashController@index');

    // Resource routes
    Route::resource('users', 'UserController');
    Route::resource('freelancers', 'FreelancerController');
    Route::resource('translations', 'TranslationController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('spec', 'SpecController');
    Route::resource('mail', 'MailController');
    Route::resource('userview', 'UserViewController');
    
    // Home
    Route::group(['prefix' => '/home',], function() {
        Route::get('/edit','HomeController@edit')->name('home.edit');
        Route::post('/update','HomeController@update')->name('home.update');
    });

    // Json
    Route::post('usersjs', array('as'=>'usersjs','uses'=>'UserController@usersjs'));
    Route::post('userviewsjs', array('as'=>'userviewsjs','uses'=>'UserViewController@userviewsjs'));
    Route::post('freelancersjs', array('as'=>'freelancersjs','uses'=>'FreelancerController@freelancersjs'));
    Route::get('specsjs', array('as'=>'specsjs','uses'=>'SpecController@specsjs'));

    // Delete routes
    Route::name('users.delete')->get('users/{user}/delete', 'UserController@destroy');
    Route::name('translations.delete')->get('translations/{translation}/delete', 'TranslationController@destroy');
    Route::name('roles.delete')->get('roles/{role}/delete', 'RoleController@destroy');
    Route::name('permissions.delete')->get('permissions/{permission}/delete', 'PermissionController@destroy');
    Route::name('freelancers.delete')->get('freelancers/{freelancer}/delete', 'FreelancerController@destroy');
    Route::name('spec.delete')->get('spec/{spec}/delete', 'SpecController@destroy');

    // Auth Controllers
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/logout', 'Auth\LoginController@logout')->name('bash.logout');

    Route::get('/activation_emails', array('as'=>'act_em','uses'=>'MailController@resendTokensList'));
    Route::get('/activation_direct', array('as'=>'act_direct','uses'=>'MailController@resendTokensDirect'));

    Route::post('/activation_emails', array('as'=>'act_em_post','uses'=>'MailController@resendTokens'));
    Route::post('/activation_direct', array('as'=>'act_direct_post','uses'=>'MailController@resendTokensDirectJob'));


});

Auth::routes();

//Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
//Route::get('/callback/{provider}', 'SocialAuthController@callback');

