@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
    
                    <div class="card-body">
                        <p><b>Welcome to Opinion!</b> These are the existing categories where you can give your opinion:</p>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('categories.show', ['category' => $category]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection