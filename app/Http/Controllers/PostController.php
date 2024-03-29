<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function apiAgree(Request $request)
    {
        $post = Post::findOrFail($request['id']);
        $post->number_of_agrees++;
        $post->save();

        return $post;
    }

    public function apiDisagree(Request $request)
    {
        $post = Post::findOrFail($request['id']);
        $post->number_of_disagrees++;
        $post->save();

        return $post;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:50',
            'content' => 'required|max:500',
            'category_id' => 'required',
        ]);

        $img = $request->file('srcImage');
        $extension = $img->getClientOriginalExtension();
        Storage::disk('public')->put($img->getFilename().'.'.$extension, File::get($img));

        $p = new Post;
        $p->title = $validatedData['title'];
        $p->content = $validatedData['content'];
        $p->srcImage = $img->getFilename().'.'.$extension;
        $p->user_id = Auth::user()->id;
        $p->save();

        $categories = $validatedData['category_id'];

        for($i = 0, $size = count($categories); $i < $size; ++$i) {
             $p->categories()->attach($categories[$i]);
        }

        return redirect()->route('posts.show', ['id' => $p->id])->with('message', 'Post was created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
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
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('categories.index')->with('message', 'Post was deleted.');
    }
}
