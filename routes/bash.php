<?php
Route::middleware('auth')->group(function(){

	Route::name('bashkaruu.index')->get('/', 'BashController@index');

	// Resource routes
	Route::resource('users', 'UserController');
	Route::resource('translations', 'TranslationController');

	// Json
	Route::get('usersjs', array('as'=>'usersjs','uses'=>'UserController@usersjs'));

	// Delete routes
	Route::name('users.delete')->get('users/{user}/delete', 'UserController@destroy');
	Route::name('translations.delete')->get('translations/{translation}/delete', 'TranslationController@destroy');

});

Auth::routes();