<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{

    protected $WebNamespace = 'App\Http\Controllers\Web';
    protected $BashNamespace = 'App\Http\Controllers\Bash';
    protected $ApiNamespace = 'App\Http\Controllers\Api';

    public function boot()
    {
        parent::boot();
    }

    public function map()
    {
        $this->mapBashRoutes();
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapBashRoutes()
    {
        Route::prefix('bashkaruu')
             ->middleware('bash')
             ->namespace($this->BashNamespace)
             ->group(base_path('routes/bash.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->WebNamespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->ApiNamespace)
             ->group(base_path('routes/api.php'));
    }
}
