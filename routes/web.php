<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioExportController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\cambiaPasswordController;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware'=>'auth:sanctum', 'verified'],function () {
    Route::get('/usuario/export/', [UsuarioExportController::class, 'export'])->name('usuario.export');
    Route::post('/usuario/inportar/', [UsuarioExportController::class, 'inportar'])->name('usuario.inportar');
    Route::get('/usuario/exportpdf/', [UsuarioExportController::class, 'exportpdf'])->name('usuario.exportpdf');
    Route::resource('usuario',UsuarioController::class);

    Route::resource('rol',RolController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/perfil', function () {
    return view('perfil.index');
    })->name('perfil');

    Route::resource('/profile',cambiaPasswordController::class);

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
    Route::get('tag/{tag}', [PostController::class, 'tag'])->name('posts.tag');
});



