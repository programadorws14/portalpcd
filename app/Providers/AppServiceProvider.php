<?php

namespace App\Providers;

use App\Empresa;
use App\Pagina;
use App\Vaga;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {   
        $pg = Pagina::all();
        View::share('pg', $pg);
        Schema::defaultStringLength(191);
    }
}
