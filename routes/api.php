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

Route::delete('comments', 'CommentController@apiDestroy')
    ->name('api.comments.destroy');
