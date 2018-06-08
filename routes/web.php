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

Route::get('/level', 'HomeController@level');

Route::get('/section', 'HomeController@section');
Route::get('/group', 'HomeController@group');




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

Route::get('/home/posts/{post}','PostController@post');
Route::post('/home/{post}/{user}/store','CommentsController@store');
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

Route::post('/add_role/{id}/',[
    
    'uses'=> 'HomeController@addRole',
    'as'  =>'content.admin' ,
    'middleware'=> 'roles',
    'roles'=>  ['admin'] ,


    ]);


Route::post('admin/postaccept/{id}', 'adminController@postApprove')->name('posts.approve');
Route::post('admin/useraccept/{id}', 'adminController@userApprove')->name('users.approve');
Route::get('post_approve/', 'adminController@postnoApprove');
Route::get('/user', 'adminController@usernoApprove');
Route::get('/{post}','adminController@post');
Route::delete('admin/{id_user}/destroy','adminController@destroy_user')->name('users.destroy');
Route::get('/newuser', 'adminController@newuser')->name('newuser');





