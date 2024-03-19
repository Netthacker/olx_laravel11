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
     *
     * Definindo as rotas de model pré-configuradas, com os filtros para outras
     * rotas de configurações
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        //Utilizar os middlewares para setar como uma rota base da api
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        //Essa parte nem precisa, pode deletar, deixei caso queira usar as blades
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
