@extends('layouts.app')
@section('content')
    <div class="detail_wrapper">
        @foreach ($posts as $post)
        <div class="post_template">
            <p>Title : {{ $post->title}}</p>
            <p>{{ $post->content}}</p>
            <p>Posted by : {{ $post->user->name}}</p>
            <p>Poster email : {{ $post->user->email}}</p>
        </div>
        <hr>           
        @endforeach
    </div>
@endsection