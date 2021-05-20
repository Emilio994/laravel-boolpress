@extends('layouts.app')

@section('content')
    <div class="posts_wrapper">
        @foreach ($categories as $category)
        <div class="category_template">
            <h1><a href="{{ route('categories.show', $category->slug)}}">{{ $category->name}}</a></h1>
        </div>            
        @endforeach        
    </div>
@endsection