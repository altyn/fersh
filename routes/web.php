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
    Route::get('/beta', 'WebController@beta');
    Route::get('/alpha', 'WebController@alpha');
    Route::get('/privacy', 'WebController@privacy');
    Route::get('/about', 'WebController@about');

    // Authentication Routes...
    Route::get('/sign_in', 'WebAuthController@showLoginForm')->name('web.login');
    Route::post('/logout', 'WebAuthController@logout');


    // Registration Routes...
    Route::get('/sign_up', 'WebAuthController@signUpForm')->name('web.register');
    Route::post('/sign_up', 'WebRegisterController@register')->name('web.register.post');

    Route::group(['prefix' => 'profile',  'middleware' => 'auth'], function(){
        Route::get('/', 'UserController@profile')->name('profile');
        // Route::get('/info', 'UserController@profileInfo')->name('profile.info');
        Route::get('/step', 'UserController@profileStep')->name('profile.step');
    });

    // Freeelancer info manipulations...
    Route::group(['prefix' => 'freelancer',  'middleware' => 'web'], function(){
           
        Route::group(['prefix' => '/{id}'], function(){
            // Route::get('/', 'FreelancerController@index');
            Route::group(['prefix' => 'portfolio'], function(){
                Route::get('/', 'FreelancerController@portfolio');
                Route::get('/add', 'FreelancerController@portfolioAdd');
                Route::get('/update/{portfolioId}', 'FreelancerController@portfolioUpdate');
                Route::get('/delete/{portfolioId}', 'FreelancerController@portfolioDelete');
                Route::get('/{portfolioId}', 'FreelancerController@portfolioView');                
            });
        });
        
        // Route::get('/{id}', 'FreelancerController@index');
        Route::get('/{id}', 'FreelancerController@indextwo');
        
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

    // Freelancers page
    Route::group(['prefix' => 'freelancers'], function(){
        Route::get('/', 'KatalogController@index')->name('allfreelancers');
        Route::get('/search', 'KatalogController@searchBySphere')->name('freelancersByCategory');
        Route::get('/{id}', 'KatalogController@sphere');
    });

    // Blog page
    Route::group(['prefix' => 'blog'], function(){
        Route::get('/', 'WebController@blogs');
        Route::get('/{id}', 'WebController@blog');
    });

    // Tasks page
    Route::group(['prefix' => 'bid'], function(){
        Route::get('/new', 'BidsController@new');
        Route::post('/new', 'BidsController@store');
    });

});

// ajax view counters

Route::post('/showphone', 'AjaxController@showPhone')->name('showphone');
Route::post('/showemail', 'AjaxController@showEmail')->name('showemail');


Auth::routes();

Route::post('/profile/info', 'UserController@profileStore')->name('profile.info.post')->middleware('auth');
Route::get('/verify/{token}', 'WebAuthController@verifyUser');
Route::get('/resend/activation', 'WebAuthController@resendActivationMail');
Route::get('/auth/{provider}/redirect/', 'WebAuthController@redirectToProvider');
Route::get('/auth/{provider}/callback/', 'WebAuthController@handleProviderCallback');