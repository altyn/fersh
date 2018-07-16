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

    // Json
    Route::post('usersjs', array('as'=>'usersjs','uses'=>'UserController@usersjs'));
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
});

Auth::routes();

//Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
//Route::get('/callback/{provider}', 'SocialAuthController@callback');

