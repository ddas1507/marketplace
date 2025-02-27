<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Crud;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Compartilhar a variável cruds com todas as views
        View::composer('admin.layouts.sidebar', function ($cruds) {
            $cruds->with('cruds', Crud::all());
        });
    }
}
