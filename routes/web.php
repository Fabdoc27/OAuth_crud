<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::view( '/', 'home' )->name( 'home' );
Route::view( '/login', 'auth.login' )->name( 'login' );
Route::view( '/dashboard', 'dashboard' )->name( 'dashboard' )->middleware( 'auth' );
Route::view( '/sineUp', 'auth.registration' )->name( 'register' );

Route::post( '/login', [LoginController::class, 'login'] )->name( 'auth.login' );
Route::post( '/sineUp', [RegistrationController::class, 'register'] )->name( 'auth.register' );

Route::get( '/login/{user:email}', [LoginController::class, 'loginByLink'] )->middleware( ['signed', 'guest'] )->name( 'auth.session' );
Route::post( '/logout', [LoginController::class, 'logout'] )->name( 'logout' );

Route::controller( ContactController::class )
    ->prefix( 'contacts' )
    ->middleware( 'auth' )
    ->group( function () {
        Route::get( '/', 'index' )->name( 'index' );
        Route::get( '/create', 'create' )->name( 'create' );
        Route::post( '/store', 'store' )->name( 'store' );
        Route::get( '/{id}/edit', 'edit' )->name( 'edit' );
        Route::post( '/{id}/update', 'update' )->name( 'update' );
        Route::delete( '/{id}/delete', 'destroy' )->name( 'delete' );
    } );