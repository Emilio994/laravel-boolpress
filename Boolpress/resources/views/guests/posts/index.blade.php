@extends('layouts.app')

@section('content')
    <div class="posts_wrapper">
        @foreach ($posts as $post)
        <div class="post_template">
            <h1><a href="{{ route('posts.show', $post->slug)}}">{{ $post->title}}</a></h1>
            <p>{{ $post->content }}</p>
        </div>            
        @endforeach        
    </div>
@endsection