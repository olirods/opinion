<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('comments/{post_id}', 'CommentController@apiIndex')
    ->name('api.comments.index');

Route::post('comments', 'CommentController@apiStore')
    ->name('api.comments.store');

Route::post('comments/agree', 'CommentController@apiAgree')
    ->name('api.comments.agree');

Route::post('comments/disagree', 'CommentController@apiDisagree')
    ->name('api.comments.disagree');

Route::post('posts/agree', 'PostController@apiAgree')
    ->name('api.posts.agree');

Route::post('posts/disagree', 'PostController@apiDisagree')
    ->name('api.posts.disagree');

Route::delete('comments', 'CommentController@apiDestroy')
    ->name('api.comments.destroy');
