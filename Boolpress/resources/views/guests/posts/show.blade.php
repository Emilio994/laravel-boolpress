@extends('layouts.app')
@section('content')
    <div class="detail_wrapper">
        <h1>Title : {{ $post->title}}</h1>
        <p>Description : {{ $post->content}}</p>
        <p>Posted by : {{ $post->user->name}}</p>
        <p>Poster email : {{ $post->user->email}}</p>
    </div>
@endsection