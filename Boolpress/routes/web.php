<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', 'HomeController@index')->name('guests-home');

Route::resource('/posts', 'PostController');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
        Route::get('/', 'HomeController@index')->name('admin-home');
        Route::resource('/posts', 'Postcontroller')->names([
            'store' => 'admin.posts.store',
            'index' => 'admin.posts.index',
            'create' => 'admin.posts.create',
            'destroy' => 'admin.posts.destroy',
            'update' => 'admin.posts.update',
            'show' => 'admin.posts.show',
            'edit' => 'admin.posts.edit',
        ]);
        
    });

Route::resource('/categories', 'CategoryController');
