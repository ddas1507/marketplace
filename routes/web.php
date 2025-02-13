<?php

require __DIR__.'/auth.php';

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

foreach (File::allFiles(__DIR__ .'/web') as $route_file) {
    require $route_file->getPathname();
}

// rota para fazer login como administrador.
Route::get('admin/login', [AdminController::class,'login'])->name('admin.login');

// rota para recuperar senha.
Route::get('admin/forgot-password', [AdminController::class,'forgotPassword'])->name('admin.forgotpassword');


