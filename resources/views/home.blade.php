@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
            <div class="card">

                <div class="card-body">
                    <p><a href="/categories" class="btn btn-primary">CATEGORIES</a></p>
                    <a href="{{ route('posts.create' )}}" class="btn btn-primary">New Post</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
