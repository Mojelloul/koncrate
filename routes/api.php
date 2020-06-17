<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/posts/{limit?}','Api\PostsController@getAllPosts');
Route::get('/posts/show/{slug}','Api\PostsController@getPost');

Route::get('/services/{limit?}','Api\ServicesController@getAllServices');
Route::get('/services/show/{slug}','Api\ServicesController@getService');

Route::get('/slides/{limit?}','Api\SlidersController@getAllSlides');

Route::get('/page/{slug}','Api\PageController@getPage');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
