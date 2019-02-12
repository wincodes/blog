<?php

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

Route::get('/', 'BlogController@index');

Route::get('/about', function () {
    return view('about');
});

//Route::get('/post/view/{id}/{title}', 'BlogController@show');
Route::get('blog/{id}', 'BlogController@show');


Route::get('/post/new', 'PostsController@new')->middleware('auth');

Route::post('/blog', 'BlogController@store')->middleware('auth');

Route::get('/blog/{id}/edit', 'BlogController@edit')->middleware('auth');
Route::patch('/blog/{id}', 'BlogController@update')->middleware('auth');
Route::delete('/blog/{id}', 'BlogController@destroy')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/secure/logout', 'logoutController@index');
