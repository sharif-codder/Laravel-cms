<?php

use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminPostController@post']);

Route::group(['middleware'=>'admin'],function(){

	Route::get('/admin',function(){

        return view('admin.index');
    });

    Route::resource('admin/user','AdminUserController');

    Route::resource('admin/post','AdminPostController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/media','AdminMediaController');

    Route::resource('admin/comment','PostCommentController');

    Route::resource('admin/comment/reply','CommentReplyController');

});

Route::group(['middleware'=>'auth'],function(){

	Route::post('comment/reply','CommentReplyController@createReply');

});

