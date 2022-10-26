<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// auth route:
Auth::routes();

 


// Route::get('/dashboard',[HomeController::class, "index"])->name('dashboard.index');
// Dashboard routes:
Route::middleware('auth')->name('client.')->group(function() {
    Route::controller(HomeController::class)->prefix('dashboard')->name('dashboard.')->group(function() {
        Route::get('/', 'index')->name('index');
    });

    Route::controller(CategoryController::class)->prefix('categories')->name('category.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{category}/edit', 'edit')->name('edit');
        Route::get('{category}', 'show')->name('show');
        Route::put('{category}', 'update')->name('update');
        Route::delete('{category}', 'destroy')->name('destroy');
        Route::get('{category}/restore', 'restore')->name('restore');
        Route::get('{category}/trash', 'forceDelete')->name('forceDelete');
    });

    Route::controller(PostController::class)->prefix('posts')->name('post.')->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{post}/edit', 'edit')->name('edit');
        Route::get('{post}', 'show')->name('show');
        Route::put('{post}', 'update')->name('update');
        Route::delete('{post}', 'destroy')->name('destroy');
        Route::get('{post}/restore', 'restore')->name('restore');
        Route::get('{post}/trash', 'forceDelete')->name('forceDelete');
         
    });
});


// Frontend Route:
Route::controller(FrontendController::class)->name('frontend.')->group(function() {
    Route::get('/', 'index')->name('index');
     
    Route::get('post/{slug}','singlePageView')->name('single.view');
    Route::get('postview/{slug}', 'singleView')->name('singleview');
    Route::get('search','search')->name('search.submit');
    
});


// post hard delete:
// Route::get('/post/delete/{id}',[PostController::class, 'PosHardDelete'])->name('post.hardDelete');