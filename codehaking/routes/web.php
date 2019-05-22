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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/post/{id}',['as'=>'home.post','uses'=>'HomeController@post']);

Route::group(['middleware'=>'auth'],function(){

    Route::get('/','HomeController@index');

    Route::post('/user/comment',['as'=>'user.comment','uses'=>'PostCommentController@store']);

    Route::post('/user/reply',['as'=>'user.reply','uses'=>'CommentReplyController@createReply']);
});

Route::group(['middleware'=>'admin'],function(){


	Route::get('/admin','adminController@index');

    Route::resource('admin/user','AdminUserController',['names'=>[

         'index'=>'admin.user.index',
         'create'=>'admin.user.create',
         'store'=>'admin.user.store',
         'edit'=>'admin.user.edit',

    ]]);

    Route::resource('admin/post','AdminPostController',['names'=>[

         'index'=>'admin.post.index',
         'create'=>'admin.post.create',
         'store'=>'admin.post.store',
         'edit'=>'admin.post.edit',

    ]]);

    Route::resource('admin/categories','AdminCategoriesController',['names'=>[

         'index'=>'admin.categories.index',
         'create'=>'admin.categories.create',
         'store'=>'admin.categories.store',
         'edit'=>'admin.categories.edit',

    ]]);

    Route::resource('admin/media','AdminMediaController',['names'=>[

         'index'=>'admin.media.index',
         'create'=>'admin.media.create',
         'store'=>'admin.media.store',
         'edit'=>'admin.media.edit',

    ]]);

    Route::resource('admin/comment','PostCommentController',['names'=>[

         'index'=>'admin.comment.index',
         'create'=>'admin.comment.create',
         'store'=>'admin.comment.store',
         'show'=>'admin.comment.show',
         'edit'=>'admin.comment.edit',

    ]]);

    Route::resource('admin/comment/reply','CommentReplyController',['names'=>[
         
         'index'=>'admin.comment.reply.index',
         'create'=>'admin.comment.reply.create',
         'store'=>'admin.comment.reply.store',
         'edit'=>'admin.comment.reply.edit',
         'show'=>'admin.comment.reply.show',

    ]]);

});

Route::post('delete/media','AdminMediaController@deleteMedia');


Route::group(['middleware'=>'auth'],function(){

Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
Route::get('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\LfmController@upload');

Route::post('comment/reply','CommentReplyController@createReply');
});
