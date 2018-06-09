<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Blade;
use App\Models\Translation\ModelName as Translation;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadLocalization();
        $this->loadLocalizationData();
    }

    private function loadLocalization()
    {
        $lang = Request::capture()->segment(1);
        if ($lang == null)
        {
            $lang = app()->getLocale();
        }
        if($lang != 'ky' && $lang != 'ru' && $lang != 'en'){
            redirect('/' . app()->getLocale() . '/' . $lang);
        }else{
            app()->setLocale($lang);
        }
        Carbon::setLocale(app()->getLocale());
    }

    private function loadLocalizationData()
    {
        view()->composer('*', function ($view)
        {
            $view->with('errorTitle', app()->getLocale() == 'ru' ? 'Не найдена' : ((app()->getLocale() == 'ky') ? 'Табылган жок' : 'Not found'));
            $view->with('translations',  Translation::getAll());
            $view->with('current_url', Request::capture()->segment(2));
            $view->with('current_path', substr(Request::capture()->path(), 3));
            $view->with('home', '/'.Request::capture()->segment(1));
            $view->with('locale', \Request::getRequestUri());
            $view->with('fullpath', \Request::fullUrl());
        });
    }

    public function register()
    {
        //
    }
}
