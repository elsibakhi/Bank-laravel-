<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    
    public const HOME = '/home';
    //this to indicate to  App\Http\Controllers namespace in any route -- web or api or any custom route

 protected $namespace ='App\Http\Controllers';
    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
            ->namespace($this->namespace) //here we use $namespace
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
               ->namespace($this->namespace)  //here we use $namespace
                ->group(base_path('routes/web.php'));
       
            Route::middleware('web')
            ->namespace($this->namespace)  //here we use $namespace
                ->group(base_path('routes/bank/admin.php'));
     
            Route::middleware('web')
            ->namespace($this->namespace)  //here we use $namespace
                ->group(base_path('routes/bank/empolyee.php'));
       
            Route::middleware('web')
            ->namespace($this->namespace)  //here we use $namespace
                ->group(base_path('routes/bank/client.php'));
            });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
