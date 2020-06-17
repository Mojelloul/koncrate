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

Route::get('/', "SiteController@index");
Route::get('/services', "SiteController@services");
Route::get('/blog', "SiteController@blog");
Route::get('/about', "SiteController@about");
Route::get('/contact', "SiteController@contact");
Route::post('/contact', "SiteController@storeContact");
Route::get('/blog/{id}', "SiteController@show");
Route::get('/service/{id}', "SiteController@service");
Route::get('/posts/{id}', "SiteController@getPostsOfCategory");


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
