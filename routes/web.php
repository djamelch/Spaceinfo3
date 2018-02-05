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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/posts','PagesController@posts');
Route::get('/posts/{post}','PagesController@post');
Route::post('/posts/store','PagesController@store');
Route::post('/posts/{post}/store','CommentsController@store');
 




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/store', 'HomeController@store');
Route::post('/home/{post}/store','CommentsController@store');
Route::get('/admin',[
    
    'uses'=> 'HomeController@admin',
    'as'  =>'content.admin' ,
    'middleware'=> 'roles',
    'roles'=>  ['admin'] ,


	]);