<?php

use Illuminate\Support\Facades\Route;

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

Route::redirect('/', 'blog');

Auth::routes();

Route::get('/', 'web\PageController@blog')->name('blog');

//Web
Route::get('entrada/{slug}', 'Web\PageController@post')->name('post');
Route::get('etiqueta/{slug}', 'Web\PageController@tag')->name('tag');
Route::get('categoria/{slug}', 'Web\PageController@category')->name('category');

//Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('tags', 'Admin\TagController');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('users', 'Admin\UserController')->except('create', 'store');
    Route::put('users/{user}/newPassword', 'Admin\UserController@updatePassword')->name('users.newPassword');
    Route::resource('roles', 'Admin\RoleController');
});