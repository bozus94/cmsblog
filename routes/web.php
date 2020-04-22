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
Route::get('entrada/{slug}', 'web\PageController@post')->name('post');
Route::get('etiqueta/{slug}', 'web\PageController@tag')->name('tag');
Route::get('categoria/{slug}', 'web\PageController@category')->name('category');
