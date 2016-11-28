@extends('layouts.app')
@section('title', 'Posts')
@section('page-class', 'posts-index')

@section('content')
    <div class="container">
      <div class='grid'>
        @foreach ($posts as $post)
          <div class='grid-item'>
            <a href="{{route('posts.show', $post->id)}}"><img src="{{$post->image->url('medium')}}"/></a>
            <div>
              <h2><a href="{{route('posts.show', $post->id)}}">{{ $post->title }}</a></h2>
              <p>{{$post->user->name}} &smashp; {{date('F j, Y', strtotime($post->created_at))}}</p>
            </div>

          </div>
        @endforeach
      </div>
    </div>
@endsection
