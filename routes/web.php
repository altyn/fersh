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

// Json
Route::get('specsjs', array('as'=>'specsjs', 'uses'=>'JsonController@specsjs'));

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

    // Freeelancer info manipulations...
    Route::group(['prefix' => 'freelancer',  'middleware' => 'auth'], function(){
           
        Route::group(['prefix' => '/{id}'], function(){
            // Route::get('/', 'FreelancerController@index');
            Route::group(['prefix' => 'portfolio'], function(){
                Route::get('/', 'FreelancerController@portfolio');
                Route::get('/add', 'FreelancerController@portfolioAdd');
                Route::get('/update/{portfolioId}', 'FreelancerController@portfolioUpdate');
                Route::post('/delete', 'FreelancerController@portfolioDelete');
                Route::get('/{portfolioId}', 'FreelancerController@portfolioView');                
            });
        });
        
        Route::get('/{id}', 'FreelancerController@index');
        
        Route::group(['prefix' => 'edit'], function(){
            Route::get('/personal', 'FreelancerController@personal');
            Route::get('/contacts', 'FreelancerController@contacts');
            Route::get('/specialization', 'FreelancerController@specialization');
            Route::get('/changepassword', 'FreelancerController@changepassword');
            Route::get('/notifications', 'FreelancerController@notifications');
            Route::get('/accounts', 'FreelancerController@accounts');
        });
        
        // Post 
        Route::name('portfolioCreate')->post('/portfolio/create', 'FreelancerController@portfolioCreate');
        Route::name('portfolioEdit')->post('/portfolio/edit', 'FreelancerController@portfolioEdit');
        Route::get('/portfolio/{portfolioId}/deletefile/{fileid}', 'FreelancerController@portfolioDeleteFile'); 

        Route::name('updateFreelancer')->post('/edit/personal', 'FreelancerController@updateFreelancer');
        Route::name('updateSpec')->post('/edit/specialization', 'FreelancerController@updateSpec');
        Route::name('deleteFreelancerAvatar')->post('/edit/deletefreelanceravatar', 'FreelancerController@deleteFreelancerAvatar');
        Route::name('freelancerChangepassword')->post('/edit/changepassword', 'FreelancerController@changepasswordPost');
    });

});

Auth::routes();

Route::post('/profile/info', 'UserController@profileStore')->name('profile.info.post')->middleware('auth');
Route::get('/verify/{token}', 'WebAuthController@verifyUser');
Route::get('/auth/{provider}/redirect/', 'WebAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback/', 'WebAuthController@handleProviderCallback');