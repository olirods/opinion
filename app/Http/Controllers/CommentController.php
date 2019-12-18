<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{

    public function apiAgree(Request $request)
    {
        $comment = Comment::findOrFail($request['id']);
        $comment->number_of_agrees++;
        $comment->save();

        return $comment;
    }

    public function apiDisagree(Request $request)
    {
        $comment = Comment::findOrFail($request['id']);
        $comment->number_of_disagrees++;
        $comment->save();

        return $comment;
    }

    public function apiIndex($post_id)
    {
        $comments = Comment::with('user')->where('post_id',$post_id)->get();

        return $comments;
    }

    public function apiStore(Request $request)
    {
        $c = new Comment;
        $c->content = $request['content'];
        $c->post_id = $request['post_id'];
        $c->user_id = $request['user_id'];
        $c->save();
        $c->user = User::find($c->user_id);

        return $c;
    }

    public function apiDestroy(Request $request)
    {
        $comment = Comment::findOrFail($request['id']);
        $comment->delete();

        return $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $id)
    {
        //
    }
}
