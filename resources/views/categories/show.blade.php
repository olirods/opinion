@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
        
                        <div class="card-body">
                            <p>These are the existing posts inside the <b>{{ $category->name }}</b> Category:</p>
                            <ul>
                                @foreach ($category->posts as $post)
                                    <li><a href="{{ route('posts.show', ['id' => $post->id]) }}">{{ $post->title }}</a></li>
                                @endforeach
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection