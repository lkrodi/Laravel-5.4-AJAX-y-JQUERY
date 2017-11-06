<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Este trait fue importado manualmente, es para el manejo de la BD
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Aquí le indicamos la longitud por default que tendrán los strings de las columnas de cualqueir BD.
        //si no se le indica como parámetro en cualquier migración, entonces asumirá como predeterminado esta longitud de 191
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
