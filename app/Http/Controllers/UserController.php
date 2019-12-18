<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function apiInfo($id)
    {
        $user = User::findOrFail($id);
        $comments = $user->comments;
        $posts = $user->posts;
        $total_agrees = 0;
        $total_disagrees = 0;

        for($i = 0, $size = count($comments); $i < $size; ++$i) {
            $total_agrees += $comments[$i]->number_of_agrees;
            $total_disagrees += $comments[$i]->number_of_disagrees;
        }

        for($i = 0, $size = count($posts); $i < $size; ++$i) {
            $total_agrees += $posts[$i]->number_of_agrees;
            $total_disagrees += $posts[$i]->number_of_disagrees;
        }

        return array($total_agrees, $total_disagrees);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
