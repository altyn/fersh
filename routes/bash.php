<?php

Route::middleware('admin')->group(function(){

	Route::name('bashkaruu.index')->get('/', 'BashController@index');
    // Resource routes
    Route::resource('users', 'UserController');
    Route::resource('translations', 'TranslationController');
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');

    // Json
    Route::get('usersjs', array('as'=>'usersjs','uses'=>'UserController@usersjs'));

    // Delete routes
    Route::name('users.delete')->get('users/{user}/delete', 'UserController@destroy');
    Route::name('translations.delete')->get('translations/{translation}/delete', 'TranslationController@destroy');
    Route::name('roles.delete')->get('roles/{role}/delete', 'RoleController@destroy');
    Route::name('permissions.delete')->get('permissions/{permission}/delete', 'PermissionController@destroy');

    // Auth Controllers
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/logout', 'Auth\LoginController@logout')->name('bash.logout');
});

Auth::routes();

//Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
//Route::get('/callback/{provider}', 'SocialAuthController@callback');

