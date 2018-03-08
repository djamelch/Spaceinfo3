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
 



//Route::group(['middleware' => ['web']], function () {
    //routes here
//});
Auth::routes();
  //logout
Route::get('logout', function (){
Auth::logout();
return redirect('/');
});
Route::get('/h', function () {
    return view('content.newuser');
});
  //profile
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
 //home
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/store', 'HomeController@store');
Route::get('/home/{url_file}/download', 'HomeController@download');

Route::post('/home/{post}/user/{user}/store','CommentsController@store');
Route::get('/home/{id}/edit','PostController@edit');
Route::put('/home/{id}/','PostController@update');
Route::delete('home/{id}/distroy','PostController@destroy');
 //admin
Route::get('/admin',[
    
    'uses'=> 'HomeController@admin',
    'as'  =>'content.admin' ,
    'middleware'=> 'roles',
    'roles'=>  ['admin'] ,

	]);


Route::post('admin/post/{id}', 'adminController@postApprove');
Route::get('admin/approve/', 'adminController@postnoApprove');



Route::post('/add_role',[
    
    'uses'=> 'HomeController@addRole',
    'as'  =>'content.admin' ,
    'middleware'=> 'roles',
    'roles'=>  ['admin'] ,


	]);
